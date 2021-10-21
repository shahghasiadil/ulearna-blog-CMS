<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class LikeController extends Controller
{
    //

    public function store(Post $post,Request $request)
    {
        // return $post->user;
        if($post->likedBy($request->user())){
            return response(null, 409);
        }
        $post->likes()->create(['user_id'=> $request->user()->id]);
        // $post->user()->notify();
       
        FacadesNotification::send($post->user, new PostLiked($post, Auth::user()));
        return back();
    }

    public function destroy(Post $post , Request $request)
    {
        $request->user()->likes()->where('post_id',$post->id)->delete();
        
        return back();
    }
}
