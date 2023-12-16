<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\UserModel as UserModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/dashboard');
        } else {
            $data['title'] = 'USER';
            echo view("/user/login", $data);
        }
    }
    public function register()
    {
        $data['title'] = 'REGISTER';
        echo view("/user/register", $data);
    }
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where(['email' => $email])->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'photos'    => $data['photos'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'The password you entered is incorrect!');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'Email Not found!');
            return redirect()->to('login');
        }
    }
    public function regis()
    {
        helper(['form']);

        // Set rules validation form
        $rules = [
            'name'          => 'required',
            'phone_number'  => 'required',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]',
            'image'         => 'uploaded[image]|max_size[image,2024]|is_image[image]'
        ];

        if ($this->validate($rules)) {
            // Handle image upload
            $image = $this->request->getFile('image');
            $newName = $image->getRandomName();
            $image->move('uploads/user', $newName);
            // Save data to the database
            $model = new UserModel();
            $data = [
                'name'         => $this->request->getVar('name'),
                'phone_number' => $this->request->getVar('phone_number'),
                'email'        => $this->request->getVar('email'),
                'gender'       => $this->request->getVar('gender'),
                'address'      => $this->request->getVar('address'),
                'birth_date'   => $this->request->getVar('birth_date'),
                'created_at'   => date('Y-m-d H:i:s'),
                'is_deleted'   => 0,
                'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'photos'        => $newName // Store the image file name in the database
            ];
            $model->save($data);

            // Set flash message and redirect
            $session = session();
            $session->setFlashdata('msg_succes', 'Register success!');
            return redirect()->to('login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "REGISTER";
            echo view('/user/register', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }

    public function forgot_password()
    {
        if (session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $data['title'] = 'FORGOT PASSWORD';
            return view('user/forgot_password', $data);
        }
    }

    public function forgot()
    {
        $session = session();
        $model = new UserModel();
        $nis = $this->request->getVar('nis');
        $data = $model->where('nis', $nis)->first();
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
            return redirect('reset_password');
        } else {
            $session->setFlashdata('msg', 'NIS tidak di temukan');
            return redirect('forgot_password');
        }
    }

    public function reset_password()
    {
        if (session()->get('token')) {
            $data['title'] = 'RESET PASSWORD';
            return view('user/reset_password', $data);
        } else {
            // maka redirct ke halaman login
            return redirect()->to('/login');
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
        $model = new UserModel();
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
                $session->setFlashdata('msg_succes', 'Password anda berhasil di perbarui!');
                return redirect('login');
            } else {
                $session->setFlashdata('msg', 'Token tidak valid!');
                return redirect('reset_password');
            }
        } else {
            $data['title'] = 'RESET PASSWORD';
            $data['validation'] = $this->validator;
            echo view('/user/reset_password', $data);
        }
    }
}
