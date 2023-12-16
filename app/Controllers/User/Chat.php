<?php

namespace App\Controllers\User;

use App\Models\Admin\InvoiceModel as AdminInvoiceModel;
use App\Controllers\BaseController;
use App\Models\CounselorModel;
use App\Models\ChatModel as ChatModel;
use App\Models\HasMembershipModel;

class Chat extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $user_id = session()->get('id');
            $membership = new HasMembershipModel();
            $counselor = new CounselorModel();
            $data['membership'] = $membership
                ->where('is_deleted', 0)
                ->where('user_id', $user_id)
                ->where('status', 4)
                ->first();
            if ($data['membership']) {
                $data['counselor'] = $counselor->where('is_deleted', 0)->where('id', $data['membership']['konselor_id'])->first();
            }
            $data['title'] = 'CHAT';
            return view('user/chat', $data);
        }
    }

    public function discusion($id)
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $user_id = session()->get('id');
            $membership = new HasMembershipModel();
            $counselor = new CounselorModel();
            $chats = new ChatModel();
            $data['membership'] = $membership->where('is_deleted', 0)->where('id', $id)->where('status', 4)->first();
            $data['counselor'] = $counselor->where('is_deleted', 0)->where('id', $data['membership']['konselor_id'])->first();
            $data['chats'] = $chats->where('is_deleted', 0)->where('has_membership_id', $data['membership']['id'])->findAll();
            $data['title'] = 'CHAT';
            return view('user/discusion', $data);
        }
    }
    public function add()
    {
        // Include helper form
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            helper(['form']);

            // Set rules validation form
            $rules = [
                'user_id'       => 'required',
                'desc'   => 'required',
                'has_membership_id' => 'required',
            ];

            $user_id = $this->request->getVar('user_id');
            $has_membership_id = $this->request->getVar('has_membership_id');
            if ($this->validate($rules)) {
                $model = new ChatModel();
                $data = [
                    'user_id'            => $this->request->getVar('user_id'),
                    'description'        => $this->request->getVar('desc'),
                    'has_membership_id'  => $this->request->getVar('has_membership_id'),
                    'status'             => 1, //unread
                    'created_at'         => date('Y-m-d H:i:s'),
                    'is_deleted'         => 0
                ];
                $model->save($data);

                // Set flash message and redirect
                $session = session();
                $session->setFlashdata('msg_succes', 'Add Message data success!');
                return redirect()->to('discusion/' . $has_membership_id);
            } else {
                // Validation failed, show the form again
                $membership = new HasMembershipModel();
                $counselor = new CounselorModel();
                $data['validation'] = $this->validator;
                $data['membership'] = $membership->where('is_deleted', 0)->where('id', $user_id)->where('status', 4)->first();
                $data['counselor'] = $counselor->where('is_deleted', 0)->where('id', $data['membership']['konselor_id'])->first();
                $data['title'] = 'CHAT';
                return view('user/discusion', $data);
            }
        }
    }
}
