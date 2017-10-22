<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectAward extends Model
{
    protected $table = 'project_awards';

    public function awardDetail(){
        return $this->hasOne(Awards::class,'id','award_id');
    }
}
