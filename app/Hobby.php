<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hobby extends Model
{
    protected $table = "hobbies";

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
