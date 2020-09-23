<?php

namespace Modules\Api\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class User extends Model
{
    use Notifiable, HasApiTokens;
    protected $connection = 'mysql';
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'username','email','password',
//        'birthday','sex','marital_status','phone','remember_token','status','created_at','updated_at'
    ];

//    protected $hidden = [
//      'password', 'remember_token'
//    ];
}
