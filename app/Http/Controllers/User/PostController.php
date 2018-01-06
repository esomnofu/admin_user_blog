<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\like;
use Auth;

class PostController extends Controller
{
      public function post(post $post)
   {

   	return view('user.post', compact('post'));
   
   }


   public function getAllposts()
   {


	return $posts = post::with('likes')->where('status',1)->orderBy('created_at', 'DESC')->paginate(5);

   } 


   public function saveLike(Request $request)
   {

      $likecheck = like::where( [ 'user_id' => Auth::id(), 'post_id' => $request->id] )->first();

     
      if ($likecheck) {
       $likecheck = like::where( [ 'user_id' => Auth::id(), 'post_id' => $request->id] )->delete();
       return 'deleted';
      }else{

      $like = new like;
      $like->user_id = Auth::user()->id;
      $like->post_id = $request->id;
      $like->save(); 
      
      }
	   
        
   } 




}
