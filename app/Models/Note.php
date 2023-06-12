<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'code',
        'status',
        'is_favourite',
        'color_tag',
    ];

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
