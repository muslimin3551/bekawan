<?php

namespace App\Controllers\User;

use App\Models\UserModel as UserModel;
use App\Models\HasMembershipModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $id = session()->get('id');
            $user = new UserModel();
            $has_membership = new HasMembershipModel();
            $data['user'] = $user->where('id', $id)->first();
            $data['membership'] = $has_membership->where('user_id', $id)->findAll();
            //get paid count transactions
            $data['paid_count'] = $has_membership
                ->where('is_deleted', 0)
                ->where('status', 4)
                ->where('user_id', $id)
                ->countAllResults('id');
            //get payment confirmation count transactions
            $data['payment_confirmation_count'] = $has_membership
                ->where('is_deleted', 0)
                ->where('status', 1)
                ->where('user_id', $id)
                ->countAllResults('id');
            //get admin confirmation count transactions
            $data['admin_confirmation_count'] = $has_membership
                ->where('is_deleted', 0)
                ->where('status', 2)
                ->where('user_id', $id)
                ->countAllResults('id');
            //get failed count transactions
            $data['failed_count'] = $has_membership
                ->where('is_deleted', 0)
                ->where('status', 3)
                ->where('user_id', $id)
                ->countAllResults('id');
            $data['title'] = 'DASHBOARD';
            return view('user/dashboard', $data);
        }
    }
}
