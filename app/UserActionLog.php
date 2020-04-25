<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActionLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_name', 'created_for_name', 'action'
    ];
}
