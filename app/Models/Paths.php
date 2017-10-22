<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Paths extends Authenticatable
{
    protected $table = 'paths';
    protected $fillable = ['path_doc' , 'project_id' , 'path_vdo', 'path_program'];
}
