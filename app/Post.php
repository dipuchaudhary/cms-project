<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use softdeletes;

    protected $dates = [
        'published_at'
    ];

    protected $fillable = [
        'title','description','content','image','published_at','category_id','user_id'
    ];

    public function deleteImage(){
        return Storage::delete($this->image);
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeSearched($query){
        $search = request()->query('search');
        if(!$search){
            return $query->Published();
        }

        return $query->Published()->where('title','LIKE',"%{$search}%");
    }

    public function scopePublished($query){
        return $query->where('published_at','<=',now());
    }
}
