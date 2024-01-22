<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primary = 'id';
    protected $fillable = [
        'image',
        'title',
        'slug',
        'description',
        'content',
        'tag',
        'status_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function status()
    {
        return $this->belongsTo(Status::class);
    }


    public function comments()
    {
        //name
        return $this->morphMany(Comment::class, 'commentable');
    }




}
