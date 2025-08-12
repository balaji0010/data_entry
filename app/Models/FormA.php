<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormA extends Model
{
    protected $table = 'form_a';

    protected $fillable = [
        'field1',
        'field2',
        'field3'
    ];
}
