<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use App\User;
use App\Emotion;
use Auth;

class ProfileController extends Controller
{
    public function profile($id)
    {
    	// $user = User::
     //        join('emotions', 'users.username', '=', 'emotions.user_id')
     //        ->select('users.*', 'emotions.emot', 'emotions.text')
     //        ->first();
           
        $user = User::whereUsername($id)->first();
        $post = Emotion::where('user_id',Auth::user()->id)->get();
       
    	return view ('user.profile', compact('user','post'));
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
        $user->fullname = $r->fullname;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->bio = $r->bio;
        // $user->alamat = $r->alamat;
        // $user->facebook = $r->facebook;
        // $user->twitter = $r->twitter;
        // $user->instagram = $r->instagram;


        if (!empty($r->foto)) {
            if ($r->hasFile('foto')) {
                    $allowedTipe = [
                        'jpg', 'jpeg','png','PNG'
                    ];

                $validFile = in_array(pathinfo($r->file('foto')->getClientOriginalName(), PATHINFO_EXTENSION), $allowedTipe);

                if (!$validFile) {
                    return redirect()->back()->with('warning','Format file harus berupa jpg, jpeg, png, PNG');
                }

                $gambar         = $r->username.'_'.str_random(4) . '.'.pathinfo($r->file('foto')->getClientOriginalName(), PATHINFO_EXTENSION);
                $upload         = $r->file('foto')->move(public_path() . '/img/avatar/', $gambar);

                $user->avatar   = $gambar;
            }else{
                return redirect()->back()->with('warning','Data File lampiran tidak ada');
            }
        }

        $user->save();

        return redirect()->back()->with('success','Berhasil edit profile anda');


    }
}