<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Awards;
use App\Models\ProjectType;
use App\Models\Image;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ["project_type_id","name_project_th","name_project_eng" ,"year" ,"id_description"];

    public function projectType(){
        return $this->belongsTo(ProjectType::class,'project_type_id','id');
    }

    public function image() {
        return $this->hasMany(Image::class,'projects_id');
    }

    public function awards()
    {
        return $this->hasMany(Awards::class,'project_id');
    }

}
