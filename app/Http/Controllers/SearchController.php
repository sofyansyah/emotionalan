<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request, $query = null)
    {
    	if ($query == null)
    		return redirect()->to('home');

    	$search = User::where('username', 'like', '%'.$query.'%')->get();

    	

    	return view('search', [
    		'results' => $search,
    		'query' => $query 
    		]);
    	
    }
}
