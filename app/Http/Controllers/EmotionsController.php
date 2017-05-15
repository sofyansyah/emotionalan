<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Emotion;
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
        $emotions = Emotion::join('users', 'emotions.user_id', '=', 'users.id')->select('emotions.*','users.username')->get();
        return view ('emotion.index', compact('emotions'));
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
     $emotion->save();
        // Emotion::create ($request->all());
        // Emotion::create ([
        //     'user_id' =>Auth::user()->id,
        //     'text'=> $request->text,
        //     'emot'=> $request->emot,

        //     ]);

        $file       = $request->file('emot');
        $fileName   = $file->getClientOriginalName();
        $request->file('emot')->move("img/emot/", $fileName);

        $emotion->emot = $fileName;
        $emotion->save();

       return redirect ('/emotion');
    }
    public function show($id)
    {
        $emotion = Emotion::join('users', 'emotions.user_id', '=', 'users.id')->where('emotions.id', $id)->select('emotions.*','users.username')->first();
        return view('emotion.show', compact ('emotion'));
    }
    public function edit($id)
    {
    	$emotion= Emotion::join('users', 'emotions.user_id', '=', 'users.id')->where('emotions.id', $id)->select('emotions.*','users.username')->first();
        return view('emotion.edit', compact ('emotion'));
    }
    public function update(Request $request, $id)
    {
       $emotion = Emotion::join('users', 'emotions.user_id', '=', 'users.id')->where('emotions.id', $id)->select('emotions.*','users.username')->first();
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
         $emotion = Emotion::join('users', 'emotions.user_id', '=', 'users.id')->where('emotions.id', $id)->select('emotions.*','users.username')->first();
         $emotion->delete();
         return redirect ('/emotion');
    }
}