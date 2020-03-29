<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['categories_id','title', 'content', 'image', 'is_show', 'is_top', 'link', 'writer', 'created_at', 'updated_at'];
}
