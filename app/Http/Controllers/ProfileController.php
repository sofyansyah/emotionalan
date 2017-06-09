<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use App\User;
use App\Follow;
use App\Emotion;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile($id)
    {
    	// $user = User::
     //        join('emotions', 'users.username', '=', 'emotions.user_id')
     //        ->select('users.*', 'emotions.emot', 'emotions.text')
     //        ->first();

        $user = User::whereUsername($id)->first();
        $post = User::whereUsername($id)->join('emotions', 'users.id', '=', 'emotions.user_id')
        // ->join('emoticons', 'emotions.user_id', '=', 'emoticons.id')
      ->select('users.*','emotions.emot', 'emotions.text')
      ->orderBy('id', 'desc')
      ->get();
      
        $follow = Follow::where('user_id',Auth::user()->id)->where('id_userfollow',$user->id)->first();

        // DB::table('emotions')->groupBy('user_id')->count();

        return view ('user.profile', compact('user','post','follow'));
    }

    public function edit_profile($username)
    {
        $user = User::whereUsername($username)->first();
        return view ('user.profile_edit', compact('user'));
    }
   public function post_profile(Request $r,$id)
    {
        $user = User::findOrFail($id);
        $user->username = $r->username;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->bio = $r->bio;
        // $user->alamat = $r->alamat;
        $user->facebook = $r->facebook;
        $user->twitter = $r->twitter;
        $user->instagram = $r->instagram;

        if($r->hasFile('foto')){

            $avatar = $r->file('foto');
            $filename = $r->username.'_'.str_random(4) . '.'.pathinfo($r->file('foto')->getClientOriginalName(),PATHINFO_EXTENSION);
            Image::make($avatar)->crop(300, 300)->save (public_path('/img/avatar/' . $filename));
            
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            }


        return redirect('profile/'. $user->username)->with('success','Berhasil edit profile anda');
    }
    public function follow($username)
    {
        $user = User::whereUsername($username)->first();
        $follow = new Follow;
        $follow->user_id        = Auth::user()->id;
        $follow->id_userfollow  = $user->id;
        $follow->save();

        return redirect()->back()->with('success','Berhasil Follow '.$username);
    }
    public function unfollow($id)
    {
        $follow = Follow::findOrFail($id);
        $follow->delete();

        return redirect()->back()->with('success','Berhasil UnFollow ');
    }
}
