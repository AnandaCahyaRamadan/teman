<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable = ['title','slug','excerpt','body','user_id','image'];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
