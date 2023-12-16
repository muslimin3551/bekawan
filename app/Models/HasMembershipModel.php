<?php

namespace App\Models;

use CodeIgniter\Model;

class HasMembershipModel extends Model
{
    protected $table      = 'tbl_user_has_membership';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id', 'konselor_id', 'payment_photo', 'membership_id', 'status', 'start_date', 'end_date', 'created_at', 'updated_at', 'is_deleted'];
}
