<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;
use App\Genre;
use DB;
use Illuminate\Support\Facades\Redirect; //added by hassy008
session_start();

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

    public function filmDetails($film)
    {
      $FilmById = Film::where('slug',$film)->first();    
       $genres = Genre::all();
       return view('frontEnd.showFilm.single-film', compact('FilmById','genres'));

    	//return $film = Film::where('slug', $slug)->first();
    	//return view('post', compact('film'));

    	//$film_details= view('frontEnd.showFilm.single-film');
                  //  ->with('film_info', $film_info);
       // return view('frontEnd.master')
              //  ->with('mainContent', $film_details); 
    }
    





}
