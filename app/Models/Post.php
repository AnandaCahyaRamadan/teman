<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable,HasFactory;
    protected $fillable = ['title','slug','excerpt','body','user_id','image'];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    
    public function scopeFilter($query, array $filters){
        $query->when(($filters['search']) ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like' , '%' . $search . '%');
        });
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
