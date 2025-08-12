<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormUser extends Model
{
    //
        use HasFactory;

    protected $table = 'form_users';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
    ];
}
