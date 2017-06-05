<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Emotion;
use App\Emoticon;
use App\User;
use App\Comment;

use Auth;
class EmotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $emotions = Emotion::join('users', 'emotions.user_id', '=', 'users.id')
        // ->join('emoticons', 'emotions.user_id', '=', 'emoticons.id')
        ->select('emotions.*','users.username', 'users.avatar', 'users.fullname')
        ->orderBy('id', 'desc')
        ->get();
        // $join = User::join('comments','users.id','=','comments.user_id')
        // ->where('users.id',Auth::user()->id)
        // ->where('comments.status','1')
        // ->select('users.id','users.username','users.avatar','comments.id as comment_id','comments.reply','comments.post_id')
        // ->get();
        $emoticons = Emoticon::all();
        $users = User::inrandomOrder()->limit(5)->get();
        
        return view ('emotion.index', compact('emotions','emoticons','users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('emotion.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       $emotion = new Emotion;
       $emotion->user_id = Auth::user()->id;
       $emotion->text= $request->text;
       $emotion->emot= $request->emot;
       $emotion->emot_text= $request->emot_text; 
       $emotion->save();
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

       return redirect ('/home');
   }
   public function show($id)
   {
    $emotion = Emotion::join('users', 'emotions.user_id', '=', 'users.id')
    ->where('emotions.id', $id)
    ->select('emotions.*','users.username', 'users.avatar','users.fullname')
    ->first();

    $comment = Comment::where('post_id',$id)
    ->join('emotions','comments.post_id','=','emotions.id')
    ->where('comments.status','1')
    ->select('comments.id as comments_id','comments.user_id','comments.reply','emotions.id as post_id')
    ->get();

                            // dd($coba);

    return view('emotion.show', compact ('emotion','comment'));
}
public function edit($id)
    {
       $emotion= Emotion::join('users', 'emotions.user_id', '=', 'users.id')
       ->where('emotions.id', $id)
       ->select('emotions.*','users.username')
       ->first();
       return view('emotion.edit', compact ('emotion'));
    }
    public function update(Request $request, $id)
    {
     $emotion = Emotion::join('users', 'emotions.user_id', '=', 'users.id')
     ->where('emotions.id', $id)
     ->select('emotions.*','users.username')
     ->first();
     $emotion->update($request->all());
     return redirect ('/home');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $emotion = Emotion::join('users', 'emotions.user_id', '=', 'users.id')
       ->where('emotions.id', $id)
       ->select('emotions.*','users.username')
       ->first();
       $emotion->delete();
       return redirect ('/home');
   }
}