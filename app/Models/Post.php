<?php

namespace App\Models;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',  // Make sure this is fillable
        'image_path'
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function image(){
        if($this->image_path){
           return  asset('posts-images/'.$this->image_path);
        }
        else return asset('posts-images/default.jpg');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
