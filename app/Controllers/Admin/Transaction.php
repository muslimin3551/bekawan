<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HasMembershipModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Transaction extends BaseController
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
            $data['title'] = 'TRANSACTION';
            $transaction = new HasMembershipModel();
            $data['transactions'] = $transaction->where('is_deleted', 0)->findAll();
            return view('admin/transaction/index', $data);
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
            $user = new HasMembershipModel();
            $data['transaction'] = $user->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'status' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $user->update($id, [
                    'status'         => $this->request->getVar('status'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'data transaction updated!');
                return redirect('admin/transaction');
            }

            // tampilkan form edit
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT TRANSACTION";
            echo view('/admin/transaction/edit', $data);
        }
    }
    //--------------------------------------------------------------------------
}
