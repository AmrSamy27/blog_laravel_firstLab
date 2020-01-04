<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon;

class Post extends Model
{
    protected $fillable=['title','description','user_id','photo_name','photo_path'];
    
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
  
    
   public function getCreatedAtAttribute($date)
{
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('Y-m-d');
}
    public function user(){
            return $this->belongsTo(User::class);
    }
   
}
