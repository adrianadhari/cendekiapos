<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['author_id', 'title', 'seo_title', 'excerpt', 'meta_keywords', 'meta_description', 'featured', 'created_at', 'updated_at', 'body', 'image', 'slug', 'status','caption'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

}
