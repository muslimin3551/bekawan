<?php

namespace App\Models;

use CodeIgniter\Model;

class CounselorModel extends Model
{
    protected $table      = 'tbl_konselors';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'photos', 'phone_number', 'email', 'birth_date', 'address', 'role', 'token', 'gender', 'password', 'created_at', 'updated_at', 'is_deleted'];
}
