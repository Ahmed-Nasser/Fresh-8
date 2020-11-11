<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($post){
            $post->id = (string) Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
