<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';

    public function news(){
        return $this->hasMany(News::class);
    }

    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }
}
