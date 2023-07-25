<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Systems extends Model
{
    use SoftDeletes;

    protected $table = 'systems';

    protected $fillable = [
        'name',
        'company_id',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];


    public function Company()
    {
        return $this->HasOne(Companies::class, 'id', 'company_id');
    }
}
