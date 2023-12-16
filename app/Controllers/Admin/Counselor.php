<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CounselorModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Counselor extends BaseController
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
            $data['title'] = 'COUNSELOR';
            $counselor = new CounselorModel();
            $data['counselors'] = $counselor->where('is_deleted', 0)->findAll();
            return view('admin/counselor/index', $data);
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
            $data['title'] = "ADD COUNSELOR";
            return view('admin/counselor/create', $data);
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
                'phone_number'  => 'required',
                'role'          => 'required',
                'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_konselors.email]',
                'password'      => 'required|min_length[6]|max_length[200]',
                'confpassword'  => 'matches[password]',
                'image'         => 'uploaded[image]|max_size[image,2024]|is_image[image]'
            ];

            if ($this->validate($rules)) {
                // Handle image upload
                $image = $this->request->getFile('image');
                $newName = $image->getRandomName();
                $image->move('uploads', $newName);
                // Save data to the database
                $model = new CounselorModel();
                $data = [
                    'name'         => $this->request->getVar('name'),
                    'phone_number' => $this->request->getVar('phone_number'),
                    'email'        => $this->request->getVar('email'),
                    'gender'       => $this->request->getVar('gender'),
                    'address'      => $this->request->getVar('address'),
                    'birth_date'   => $this->request->getVar('birth_date'),
                    'role'         => $this->request->getVar('role'),
                    'created_at'   => date('Y-m-d H:i:s'),
                    'is_deleted'   => 0,
                    'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'photos'        => $newName // Store the image file name in the database
                ];
                $model->save($data);

                // Set flash message and redirect
                $session = session();
                $session->setFlashdata('msg_succes', 'Add counselor data success!');
                return redirect()->to('admin/counselor');
            } else {
                // Validation failed, show the form again
                $session = session();
                $data['name'] = $session->get('name');
                $data['validation'] = $this->validator;
                $data['title'] = "ADD COUNSELOR";
                echo view('admin/counselor/create', $data);
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
            $user = new CounselorModel();
            $data['counselor'] = $user->where('id', $id)->first();

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
                        'role'         => $this->request->getVar('role'),
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
                        'role'         => $this->request->getVar('role'),
                        'created_at'   => date('Y-m-d H:i:s'),
                        'is_deleted'   => 0,
                    ]);
                }
                $session = session();
                $session->setFlashdata('msg_succes', 'data counselor updated!');
                return redirect('admin/counselor');
            }

            // tampilkan form edit
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT COUNSELOR";
            echo view('/admin/counselor/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $user = new CounselorModel();
        $session = session();
        $user->update($id, [
            'is_deleted'   => 1
        ]);
        $session->setFlashdata('msg_succes', 'data was deleted!');
        return redirect('admin/counselor');
    }
}
