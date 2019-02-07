<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Mail;
use App\User;

class WelcomeController extends Controller
{

	public function index()
    {
    $published_post=DB::table('films')
                    ->orderBy('id','desc')
                    ->paginate(6);	
     $home=view('frontEnd.home.homeContent')
        ->with('published_post', $published_post);

     return view('frontEnd.master')
         ->with('mainContent', $home);

      //return view('frontEnd.master');  
    }

    public function filmDetails($slug)
    {
    	//return $film = Film::where('slug', $slug)->first();
    	//return view('post', compact('film'));

    	$film_details= view('frontEnd.showFilm.single-film');
                  //  ->with('film_info', $film_info);
        return view('frontEnd.master')
                ->with('mainContent', $film_details); 
    }
    





}
