<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'id','name','day_of_birth','address','password','avatar','phone','gender','start_day','user_group_id'
    ];


    public function news(){
        return $this->hasMany(News::class);
    }

    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }

}
