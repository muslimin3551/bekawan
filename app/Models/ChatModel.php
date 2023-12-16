<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table      = 'tbl_chats';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id', 'konselor_id', 'attachment', 'has_membership_id', 'status', 'description', 'created_at', 'updated_at', 'is_deleted'];
}
