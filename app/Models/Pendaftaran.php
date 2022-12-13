<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
        protected $fillable = ['user_id','file','telepon'];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
