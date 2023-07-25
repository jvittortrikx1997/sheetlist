<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cities extends Model
{
    use SoftDeletes;

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'state',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

}
