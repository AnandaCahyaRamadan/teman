<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['deskripsi','post_id','user_id','parent'];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function posts(){
        return $this->belongsTo(User::class,'post_id');
    }
    public function childs(){
        return $this->hasMany(Comment::class,'parent');
    }
}
