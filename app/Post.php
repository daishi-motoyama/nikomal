<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'content', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('postImages');
    }
    
    
    public function postCategorys()
    {
        return $this->belongsToMany(Animal::class, 'post_category', 'post_id', 'animal_id')->withTimestamps();
    }
    
    //animal_idで指定されたカテゴリーに属する
    public function belngsToCategory($animal_id)
    {
        $exist = $this->isBelongsToCategory($animal_id);
        
        if ($exist) {
            return false;
        }
        else {
            $this->postCategorys()->attach($animal_id);
            return true;
        }
    }
    
    //animal_idで指定されたカテゴリーから外れる
    public function removeBelngsToCategory($animal_id)
    {
        $exist = $this->isBelongsToCategory($animal_id);
        
        if($exist) {
            $this->postCategorys()->detach($animal_id);
            return true;
        }
        else {
            return false;
        }
    }
    
    //animal_idで指定されたカテゴリーにこの投稿が属しているか調べる
    public function isBelongsToCategory($animal_id)
    {
        return $this->postCategorys()->where('post_id',$animal_id)->exists();
    }
}
