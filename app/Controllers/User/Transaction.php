<?php

namespace App\Controllers\User;

use App\Models\MembershipModel as MembershipModel;
use App\Models\CounselorModel as CounselorController;
use App\Models\UserModel as UserModel;
use App\Models\HasMembershipModel as HasMembershipModel;
use App\Controllers\BaseController;

class Transaction extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $transaction = new HasMembershipModel();
            $data['transactions'] = $transaction->where('is_deleted', 0)->where('user_id', session()->get('id'))->findAll();
            $data['title'] = 'transaction';
            return view('user/transaction', $data);
        }
    }
    public function payment_confirmation()
    {
        // Include helper form
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            helper(['form']);

            // Set rules validation form
            $rules = [
                'id'          => 'required',
                'image'         => 'uploaded[image]|max_size[image,1024]|is_image[image]'
            ];

            $id = $this->request->getVar('id');
            if ($this->validate($rules)) {
                // Handle image upload
                $image = $this->request->getFile('image');
                $newName = $image->getRandomName();
                $image->move('uploads/payment', $newName);
                // Save data to the database
                $model = new HasMembershipModel();
                $data = [
                    'updated_at'   => date('Y-m-d H:i:s'),
                    'status'   => 2,
                    'is_deleted'   => 0,
                    'payment_photo'        => $newName // Store the image file name in the database
                ];
                $model->update($id, $data);

                // Set flash message and redirect
                $session = session();
                $session->setFlashdata('msg_succes', 'Add payment data success!');
                return redirect()->to('transaction');
            } else {
                // Validation failed, show the form again
                $session = session();
                $data['validation'] = $this->validator;
                $session->setFlashdata('msg_succes', $this->validator->listErrors());
                return redirect()->to('payment/' . $id);
            }
        }
    }
}
