<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class post extends Model
{

 protected $fillable = ['title','subtitle','slug','body'];



#to describe the relationship between two tables in the DB, 
#we need to provide a pivotal table as the second argument i.e post_tags ===> table in MYSQL DB not a file here in IDE
#Using Laravel convention it has to be in alphabetic order i.e p before t
 public function tags(){

 	return $this->belongsToMany('App\Model\user\tag', 'post_tags')->withTimestamps();
 }



 public function categories(){

 	return $this->belongsToMany('App\Model\user\category', 'category_posts')->withTimestamps();
 }


#GET POSTS BY SLUG
public function getRouteKeyName(){

	return 'slug';

}


public function getCreatedAtAttribute($value)
{

	return Carbon::parse($value)->diffForHumans();

}


public function likes()
{

	return $this->hasMany('App\Model\user\like');

}



   public function getSlugAttribute($value)
   {

      return route('post', $value);

   }

   public function getTitleAttribute($value)
   {

      return ucfirst($value);

   }


}
