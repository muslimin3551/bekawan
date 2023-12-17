<?php

namespace App\Controllers\User;

use App\Models\MembershipModel as MembershipModel;
use App\Models\HasMembershipModel;
use App\Models\CounselorModel as CounselorController;
use App\Models\UserModel as UserModel;
use App\Controllers\BaseController;

class Membership extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $membership = new MembershipModel();
            $data['memberships'] = $membership->where('is_deleted', 0)->findAll();
            $data['title'] = 'MEMBERSHIP';
            return view('user/membership', $data);
        }
    }
    public function checkout($id)
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $membership = new MembershipModel();
            $counselors = new CounselorController();
            $has_member = new HasMembershipModel();
            $user = new UserModel();
            $data['membership'] = $membership->where('id', $id)->first();
            // Fetch membership details
            $hasMembership = $has_member
                ->where('user_id', session()->get('id'))
                ->where('status', 4)
                ->first();

            // Calculate remaining days
            if ($hasMembership) {
                $endDate = new \DateTime($hasMembership['end_date']);
                $today = new \DateTime();
                $remainingDays = $today->diff($endDate)->days;
            } else {
                $remainingDays = 0;
            }
            // Check if membership is active
            $data['has_membership'] = ($remainingDays > 0) ? true : false;
            $data['counselors'] = $counselors->where('is_deleted', 0)->where('role', 2)->findAll();
            $data['user'] = $user->where('id', session()->get('id'))->first();
            $data['title'] = 'CHECKOUT';
            return view('user/checkout', $data);
        }
    }
    public function payment($id)
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $membership = new HasMembershipModel();
            $data['hasmembership'] = $membership->where('id', $id)->first();
            $data['title'] = 'PAYMENT';
            return view('user/payment', $data);
        }
    }
    public function process_checkout()
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
                'konselor_id'   => 'required',
                'membership_id' => 'required',
            ];

            $today = date('Y-m-d H:i:s');
            if ($this->request->getVar('membership_id') == 3) {
                $end_date = date('Y-m-d H:i:s', strtotime($today . ' + 30 days'));
            } elseif ($this->request->getVar('membership_id') == 2) {
                $end_date = date('Y-m-d H:i:s', strtotime($today . ' + 14 days'));
            } else {
                $end_date = date('Y-m-d H:i:s', strtotime($today . ' + 7 days'));
            }

            if ($this->validate($rules)) {

                $model = new HasMembershipModel();
                $order_previous_data = $model->where('status', 4)->where('user_id', $this->request->getVar('user_id'))->first();
                if ($order_previous_data) {
                    //update Has membership status 4 to 5 if expired
                    $data = [
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 5,
                    ];

                    $model->where('status', 4)->where('user_id', $this->request->getVar('user_id'))->update($data);
                }
                $data = [
                    'user_id'            => $this->request->getVar('user_id'),
                    'konselor_id'        => $this->request->getVar('konselor_id'),
                    'membership_id'      => $this->request->getVar('membership_id'),
                    'start_date'         => $today,
                    'end_date'           => $end_date,
                    'status'             => 1,
                    'created_at'         => date('Y-m-d H:i:s'),
                    'is_deleted'         => 0
                ];
                $model->save($data);

                // Set flash message and redirect
                $session = session();
                $session->setFlashdata('msg_succes', 'Add Checkout data success!');
                return redirect()->to('transaction');
            } else {
                // Validation failed, show the form again
                $session = session();
                $data['name'] = $session->get('name');
                $membership = new MembershipModel();
                $counselors = new CounselorController();
                $user = new UserModel();
                $data['validation'] = $this->validator;
                $data['membership'] = $membership->where('id', $this->request->getVar('membership_id'))->first();
                $data['counselors'] = $counselors->where('is_deleted', 0)->where('role', 2)->findAll();
                $data['user'] = $user->where('id', session()->get('id'))->first();
                $data['title'] = "CHECKOUT";
                echo view('user/checkout', $data);
            }
        }
    }
}
