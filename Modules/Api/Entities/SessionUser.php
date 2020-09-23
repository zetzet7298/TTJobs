<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;

class SessionUser extends Model
{
    protected $connection ='db2';
    protected $table = 'session_users';
    protected $fillable = [
        'token', 'refresh_token', 'token_expried', 'refresh_token_expried', 'user_id'
    ];
}
