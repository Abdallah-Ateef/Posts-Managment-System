<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', // أضف هذا السطر
        'content',
        // أضف أي حقول أخرى تريد أن تكون قابلة للتخصيص الجماعي
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
