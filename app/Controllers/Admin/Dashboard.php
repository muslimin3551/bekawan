<?php

namespace App\Controllers\Admin;

use App\Models\ArticleModel;
use App\Models\CounselorModel;
use App\Models\UserModel;
use App\Models\HasMembershipModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'DASBOARD';
            //article count
            $article = new ArticleModel();
            $data['article_count'] = $article
                ->where('is_deleted', 0)
                ->countAllResults('id');
            //Counselor count
            $counselor = new CounselorModel();
            $data['counselor_count'] = $counselor
                ->where('role', 2)
                ->where('is_deleted', 0)
                ->countAllResults('id');
            //User count
            $user = new UserModel();
            $data['user_count'] = $user
                ->where('is_deleted', 0)
                ->countAllResults('id');
            //Transaction count
            $membership = new HasMembershipModel();
            $data['membership_count'] = $membership
                ->where('is_deleted', 0)
                ->where('status', 4)
                ->countAllResults('id');
            //get articles 
            $data['articles'] = $article->where('is_deleted', 0)->limit(5)->findAll();
            //get transaction 
            $data['memberships'] = $membership->where('is_deleted', 0)->where('status', 4)->limit(5)->findAll();

            return view('admin/index', $data);
        }
    }
}
