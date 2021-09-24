<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    use HasFactory;
    use SoftDeletes;
    public function categoryChildrent()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}