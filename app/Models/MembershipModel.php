<?php

namespace App\Models;

use CodeIgniter\Model;

class MembershipModel extends Model
{
    protected $table      = 'tbl_membership';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'description', 'benefit', 'cost', 'created_at', 'updated_at', 'is_deleted'];
}
