<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserProject extends Model
{
    protected $table = 'project_user';

    public function memberDetail(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
