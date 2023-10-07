<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserData extends Model
{
    use HasFactory;

    protected $table = 'userdata';
    
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'pwd',
        'isadmin'
    ];
}
