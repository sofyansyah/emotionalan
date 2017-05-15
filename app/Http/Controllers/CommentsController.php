<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Auth;

class CommentsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')->select('comments.*','users.username')->get();
        return view ('emotion.show', compact('comments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('emotion.show');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
     $comment = new Comment;
     $comment->user_id = Auth::user()->id;
     $comment->post_id= $request->post_id;
     $comment->reply= $request->reply;
     $comment->status= $request->status;  
     $comment->save();
        // Emotion::create ($request->all());
        // Emotion::create ([
        //     'user_id' =>Auth::user()->id,
        //     'text'=> $request->text,
        //     'emot'=> $request->emot,

        //     ]);

        // $file       = $request->file('emot');
        // $fileName   = $file->getClientOriginalName();
        // $request->file('emot')->move("img/emot/", $fileName);

        // $emotion->emot = $fileName;
        // $emotion->save();

       return redirect ('/emotion');
    }
    public function show($id)
    {
        $comment = Comment::join('users', 'comments.user_id', 'comments.user_id','=', 'users.id')->where('comments.id', $id)->select('comments.*','users.username')->first();
        return view('emotion.show', compact ('comment'));
    }
    public function edit($id)
    {
    	$comment = Comment::join('users', 'comments.user_id', '=', 'users.id')->where('comments.id', $id)->select('comments.*','users.username')->first();
        return view('emotion.edit', compact ('comment'));
    }
    public function update(Request $request, $id)
    {
       $comment = Comment::join('users', 'comments.user_id', '=', 'users.id')->where('comments.id', $id)->select('comments.*','users.username')->first();
        $emotion->update($request->all());
        return redirect ('/emotion');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
         $comment = Comment::join('users', 'comments.user_id', '=', 'users.id')->where('comments.id', $id)->select('comments.*','users.username')->first();
         $emotion->delete();
         return redirect ('/emotion');
    }

}
