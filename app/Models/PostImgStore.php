<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImgStore extends Model
{
    use HasFactory;
    protected $table = 'post_imgs_store';
    protected $fillable = [
        'image'
    ];


    public function post()
    {
        return $this->belongsToMany(Post::class,'post_imgs');
    }
}
