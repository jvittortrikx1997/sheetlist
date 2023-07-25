<?php

namespace App\Models;

use App\Models\Auth\User;
use App\Models\Configurations\Categories;
use App\Models\Configurations\Cities;
use App\Models\Configurations\Projects;
use App\Models\Configurations\Systems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeReports extends Model
{
    use SoftDeletes;

    protected $table = 'time_reports';

    protected $fillable = [
        'user_id',
        'report_date',
        'activity',
        'category_id',
        'project_id',
        'city_id',
        'ticket_number',
        'requester',
        'system_id',
        'start_time',
        'end_time',
        'description',
        'observation',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $casts = [
        'report_date' => 'date',
        'start_time' => 'time',
        'end_time' => 'time',
    ];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function Project()
    {
        return $this->hasOne(Projects::class, 'id', 'project_id');
    }

    public function City()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }

    public function System()
    {
        return $this->hasOne(Systems::class, 'id', 'system_id');
    }

}
