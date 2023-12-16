<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel as UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
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
            $data['title'] = 'USER';
            $user = new UserModel();
            $data['users'] = $user->where('is_deleted', 0)->findAll();
            return view('admin/user/index', $data);
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
            $data['title'] = "ADD USER";
            return view('admin/user/create', $data);
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
            $user = new UserModel();
            $data['user'] = $user->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'name' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $image = $this->request->getFile('image');
                if ($image && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move('uploads', $newName);
                    $user->update($id, [
                        'name'         => $this->request->getVar('name'),
                        'phone_number' => $this->request->getVar('phone_number'),
                        'email'        => $this->request->getVar('email'),
                        'gender'       => $this->request->getVar('gender'),
                        'address'      => $this->request->getVar('address'),
                        'birth_date'   => $this->request->getVar('birth_date'),
                        'created_at'   => date('Y-m-d H:i:s'),
                        'is_deleted'   => 0,
                        'photos'        => $newName // Store the image file name in the database
                    ]);
                } else {
                    $user->update($id, [
                        'name'         => $this->request->getVar('name'),
                        'phone_number' => $this->request->getVar('phone_number'),
                        'email'        => $this->request->getVar('email'),
                        'gender'       => $this->request->getVar('gender'),
                        'address'      => $this->request->getVar('address'),
                        'birth_date'   => $this->request->getVar('birth_date'),
                        'created_at'   => date('Y-m-d H:i:s'),
                        'is_deleted'   => 0,
                    ]);
                }
                $session = session();
                $session->setFlashdata('msg_succes', 'data user updated!');
                return redirect('admin/user');
            }

            // tampilkan form edit
            $data['title'] = "EDIT USER";
            echo view('/admin/user/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $user = new UserModel();
        $session = session();
        $user->update($id, [
            'is_deleted'   => 1
        ]);
        $session->setFlashdata('msg_succes', 'data was deleted!');
        return redirect('admin/user');
    }
}
