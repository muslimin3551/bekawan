<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CounselorModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/dashboard');
        } else {
            $data['title'] = 'USER';
            echo view("/admin/auth-login", $data);
        }
    }
    public function auth()
    {
        $session = session();
        $model = new CounselorModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where(['email' => $email])->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'role'       => $data['role'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'admin_logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password not Correct!');
                return redirect()->to('admin/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Valid!');
            return redirect()->to('admin/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('admin/login');
    }

    public function forgot_password()
    {
        if (session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $data['title'] = 'FORGOT PASSWORD';
            return view('admin/auth-forgot', $data);
        }
    }

    public function forgot()
    {
        $session = session();
        $model = new CounselorModel();
        $email = $this->request->getVar('email');
        $data = $model->where('email', $email)->first();
        if ($data) {
            //generate uniq token
            $token = md5(uniqid($data['name'], true));
            $model->update($data['id'], [
                'token'     => $token,
                "updated_at" => date('Y-m-d hh:mm:ss'),
            ]);
            $data = [
                'token' => $token
            ];
            $session->set($data);
            return redirect('admin/reset_password');
        } else {
            $session->setFlashdata('msg', 'Email Not Found');
            return redirect('admin/forgot_password');
        }
    }

    public function reset_password()
    {
        if (session()->get('token')) {
            $data['title'] = 'RESET PASSWORD';
            return view('admin/auth-reset', $data);
        } else {
            // maka redirct ke halaman login
            return redirect()->to('admin/login');
        }
    }
    public function reset()
	{
		//include helper form
		$session = session();
		helper(['form']);
		//set rules validation form
		$rules = [
			'password'      => 'required|min_length[6]|max_length[200]',
			'confm_password'  => 'matches[password]'
		];
		$model = new CounselorModel();
		$session = session();
		$token = $session->get('token');
		$data = $model->where('token', $token)->first();
		if ($this->validate($rules)) {
			if ($data) {
				$model->update($data['id'], [
					'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
					'token' => null,
                    "updated_at" => date('Y-m-d hh:mm:ss'),

				]);
				$session = session();
				$session->setFlashdata('msg_succes', 'Reset Password Success!');
				return redirect('admin/login');
			} else {
				$session->setFlashdata('msg', 'Token not valid!');
				return redirect('admin/reset_password');
			}
		} else {
            $data['title'] = 'RESET PASSWORD';
			$data['validation'] = $this->validator;
			echo view('/admin/auth-reset', $data);
		}
	}
}
