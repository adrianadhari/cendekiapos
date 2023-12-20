<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['id','parent_id', 'order','name','slug'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
