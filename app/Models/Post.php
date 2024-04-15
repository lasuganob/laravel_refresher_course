<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'featured_image', 'status'];

    // relationships
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
