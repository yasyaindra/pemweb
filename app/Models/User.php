<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    //
    use HasFactory;
    protected $connection = 'mysql';
    protected $fillable = [
        'username', 'password', 'token', 'created_at', 'updated_at'
    ];
}
