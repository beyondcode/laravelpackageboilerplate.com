<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[\Illuminate\Database\Eloquent\Attributes\Fillable([
    'name', 'email', 'github_id', 'avatar', 'nickname', 'github_token'
])]
#[\Illuminate\Database\Eloquent\Attributes\Hidden([
    'remember_token', 'github_token'
])]
class User extends Authenticatable
{
    use Notifiable;
}
