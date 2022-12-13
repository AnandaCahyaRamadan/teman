<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','pesan','balasan'];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
