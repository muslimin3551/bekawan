<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tbl_users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'photos', 'phone_number', 'email', 'birth_date', 'address', 'token', 'gender', 'password', 'role', 'created_at', 'updated_at', 'is_deleted'];
}
