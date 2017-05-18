<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Emotion;
use App\User;
use App\Emoticon;

use Auth;
class EmoticonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $emoticons = Emoticon::join('users', 'emoticons.post_id', '=', 'users.id')
        ->select('emoticons.*','users.username', 'users.avatar')
        ->orderBy('id', 'desc')
        ->get();
        //  $join = Emotion::join('emoticons','emotions.id','=','emoticons.post_id')
        // ->select('emotion.emot','emotion.text','emotion.id as emotion_id','emoticons.emoticons','emoticons.details' 'emoticons.post_id')
        // $join = User::join('emoticons','users.id','=','emoticons.user_id')
        // ->where('users.id',Auth::user()->id)
        // ->select('users.id','users.username','users.avatar','emoticons.id as emoticons_id','emoticons.emoticons','emoticons.text')
        // ->get();
        
        return view ('emotion.emoticon', compact('emoticons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('emotion.emoticon');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       $emoticon = new Emoticon;
       $emoticon->user_id = Auth::user()->id;
       $emoticon->emoticon= $request->emoticon;
       $emoticon->details= $request->details; 
       $emoticon->save();
        // Emotion::create ($request->all());
        // Emotion::create ([
        //     'user_id' =>Auth::user()->id,
        //     'text'=> $request->text,
        //     'emot'=> $request->emot,

        //     ]);

       $file       = $request->file('emoticon');
       $fileName   = $file->getClientOriginalName();
       $request->file('emoticon')->move("img/emoticon/", $fileName);

       $emotion->emot = $fileName;
       $emotion->save();

       return redirect ('/home');
   }
   public function show($id)
   {
    


}
public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {

   }
}