<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    protected $table = 'awards';
    protected $fillable = ["name_award","year_award","number"];


}
