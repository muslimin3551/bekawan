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
            $data['title'] = 'DASHBOARD';
            return view('user/dashboard', $data);
        }
    }
}
