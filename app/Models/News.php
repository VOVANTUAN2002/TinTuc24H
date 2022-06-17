<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'news';

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function category_news(){
        return $this->belongsTo(CategoryNew::class,'categorie_id','id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
