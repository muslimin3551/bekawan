<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\StudentModel as AdminStudentModel;

class Profile extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $student_id = $session->get('student_id');
            // ambil artikel yang akan diedit
            $student = new AdminStudentModel();
            $data['student'] = $student->where('id', $student_id)->first();
            // lakukan validasi data mahasiswa
            if ($this->request->getPost()) {
                $validation =  \Config\Services::validation();
                $validation->setRules([
                    'name' => 'required',
                    'address' => 'required',
                    'brd_date' => 'required',
                ]);
                $isDataValid = $validation->withRequest($this->request)->run();
                // jika data vlid, maka simpan ke database
                if ($isDataValid) {
                    $student->update($student_id, [
                        "name" => $this->request->getPost('name'),
                        "address" => $this->request->getPost('address'),
                        "brd_date" => $this->request->getPost('brd_date'),
                        "updated_at" => date('Y-m-d hh:mm:ss'),
                    ]);
                    $session = session();
                    $session->setFlashdata('msg_succes', 'data  telah berhasil di update!');
                    return redirect('profile');
                } else {
                    $session = session();
                    $data['validation'] = $this->validator;
                    return redirect('profile',$data);
                }
            }

            // tampilkan form edit
            $data['title'] = "PROFIL";
            echo view('/user/profile', $data);
        }
    }
}
