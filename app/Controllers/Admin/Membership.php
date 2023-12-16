<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MembershipModel as MembershipModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Membership extends BaseController
{
    public function __construct()
    {
        helper('AdminUserHelper');
    }
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'MEMBERSHIP';
            $membership = new MembershipModel();
            $data['memberships'] = $membership->where('is_deleted', 0)->findAll();
            return view('admin/membership/index', $data);
        }
    }

    //--------------------------------------------------------------------------

    public function create()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            // tampilkan form create
            $data['title'] = "ADD MEMBERSHIP";
            return view('admin/membership/create', $data);
        }
    }
    public function add()
    {
        // Include helper form
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            helper(['form']);

            // Set rules validation form
            $rules = [
                'name'          => 'required',
                'dsc'   => 'required',
                'benefit'       => 'required',
                'cost'         => 'required'
            ];

            if ($this->validate($rules)) {
                $model = new MembershipModel();
                $data = [
                    'name'         => $this->request->getVar('name'),
                    'description' => $this->request->getVar('dsc'),
                    'benefit'        => $this->request->getVar('benefit'),
                    'cost'       => $this->request->getVar('cost'),
                    'created_at'   => date('Y-m-d H:i:s'),
                    'is_deleted'   => 0
                ];
                $model->save($data);

                // Set flash message and redirect
                $session = session();
                $session->setFlashdata('msg_succes', 'Add membership data success!');
                return redirect()->to('admin/membership');
            } else {
                // Validation failed, show the form again
                $session = session();
                $data['name'] = $session->get('name');
                $data['validation'] = $this->validator;
                $data['title'] = "ADD MEMBERSHIP";
                echo view('admin/membership/create', $data);
            }
        }
    }


    //--------------------------------------------------------------------------

    public function edit($id)
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $user = new MembershipModel();
            $data['membership'] = $user->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'name' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $user->update($id, [
                    'name'         => $this->request->getVar('name'),
                    'description' => $this->request->getVar('dsc'),
                    'benefit'        => $this->request->getVar('benefit'),
                    'cost'       => $this->request->getVar('cost'),
                    'created_at'   => date('Y-m-d H:i:s'),
                    'is_deleted'   => 0
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'data membership updated!');
                return redirect('admin/membership');
            }

            // tampilkan form edit
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT MEMBERSHIP";
            echo view('/admin/membership/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $user = new MembershipModel();
        $session = session();
        $user->update($id, [
            'is_deleted'   => 1
        ]);
        $session->setFlashdata('msg_succes', 'data was deleted!');
        return redirect('admin/membership');
    }
}
