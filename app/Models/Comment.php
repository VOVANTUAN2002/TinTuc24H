<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'id','content','new_id','status'
    ];

    public function news(){
        return $this->belongsTo(News::class, 'new_id','id');
    }
}
