<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table      = 'tbl_article';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['konselor_id', 'title', 'sort_description', 'photo', 'is_published', 'description', 'tag', 'views', 'likes', 'created_at', 'updated_at', 'is_deleted'];
}
