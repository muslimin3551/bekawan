<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CounselorModel;
use App\Models\ChatModel as ChatModel;
use App\Models\HasMembershipModel;
use App\Models\UserModel;

class Chat extends BaseController
{
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $user_id = session()->get('id');
            $membership = new HasMembershipModel();
            $data['membership'] = $membership
                ->where('is_deleted', 0)
                ->where('konselor_id', $user_id)
                ->where('status', 4)
                ->findAll();
            $data['title'] = 'CHAT';
            return view('admin/chat/index', $data);
        }
    }

    public function discusion($id)
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $user_id = session()->get('id');
            $membership = new HasMembershipModel();
            $user = new UserModel();
            $chats = new ChatModel();
            $data['membership'] = $membership->where('is_deleted', 0)->where('id', $id)->where('status', 4)->first();
            $data['user'] = $user->where('is_deleted', 0)->where('id', $data['membership']['user_id'])->first();
            $data['chats'] = $chats->where('is_deleted', 0)->where('has_membership_id', $data['membership']['id'])->findAll();
            $data['title'] = 'CHAT';
            return view('admin/chat/discusion', $data);
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
                'user_id'       => 'required',
                'desc'   => 'required',
                'has_membership_id' => 'required',
            ];

            $user_id = $this->request->getVar('user_id');
            $has_membership_id = $this->request->getVar('has_membership_id');
            if ($this->validate($rules)) {
                $model = new ChatModel();
                $data = [
                    'counselor_id'        => $this->request->getVar('user_id'),
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
                return redirect()->to('admin/discusion/' . $has_membership_id);
            } else {
                // Validation failed, show the form again
                $membership = new HasMembershipModel();
                $counselor = new CounselorModel();
                $data['validation'] = $this->validator;
                $data['membership'] = $membership->where('is_deleted', 0)->where('id', $user_id)->where('status', 4)->first();
                $data['counselor'] = $counselor->where('is_deleted', 0)->where('id', $data['membership']['konselor_id'])->first();
                $data['title'] = 'CHAT';
                return view('admin/chat/discusion', $data);
            }
        }
    }
}
