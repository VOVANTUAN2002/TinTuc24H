<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNew extends Model
{
    use HasFactory;
    protected $table = 'news';

    public function categories(){
        return $this->belongsTo(Category::class,'categorie_id','id');
    }

    public function news(){
        return $this->belongsTo(News::class,'new_id','id');
    }
}
