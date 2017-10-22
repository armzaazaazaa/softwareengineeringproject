<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectAdvisor extends Model
{
    protected $table = 'project_advisors';
    const STATUS_MAIN = 'MAIN';
    const STATUS_SUB = 'SUB';
}
