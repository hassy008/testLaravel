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


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFilm()
    {
        $genres = Genre::all();
       return view('admin.film.add-film', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function saveFilm(Request $request)
    {
       // return $request->all();
         $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'ticket_price' => 'required',
            'rating' => 'required',
            'country' => 'required',
            'image' => 'required',
            
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('film'))
            {
                Storage::disk('public')->makeDirectory('film');
            }
            $filmImage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('film/'.$imageName,$filmImage);
        } else {
            $imageName = "default.png";
        }
        $film = new Film();
        $film->name = $request->name;
        $film->slug = $slug;
        $film->description = $request->description;
        $film->release_date = $request->release_date;
        $film->video = $request->video;
        $film->ticket_price = $request->ticket_price;
        $film->rating = $request->rating;
        $film->image = $imageName;
        $film->country = $request->country;
        
        $film->save();
        $film->genres()->attach($request->genres);
       
        
        Toastr::success('Post Successfully Saved :)','Success');
        return back();


    }


    public function manageFilm()
    {
      //  $manage_all_film = Film::latest()->get();
       // return view('admin.film.manage-film', compact('manage_all_film'));

      $manage_all_film = DB::table('films')
                        ->orderBy('id', 'Desc')
                        ->get();

      $manage_film_page=view('admin.film.manage-film')
                 ->with('manage_all_film', $manage_all_film);
       return view('admin.admin_master')
             ->with('mainContent', $manage_film_page); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function editFilm( $film)
    {
    $FilmById = Film::where('id',$film)->first();    
       $genres = Genre::all();
       return view('admin.film.edit-film', compact('FilmById','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function updateFilm(Request $request,film $film)
    {
        // return $request->all();
         $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'ticket_price' => 'required',
            'rating' => 'required',
            'country' => 'required',
           
            
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $film = Film::find($request->id);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('film'))
            {
                Storage::disk('public')->makeDirectory('film');
            }
// delete old image
            if (storage::disk('public')->exists('film/'.$film->image)) 
            {
               Storage::disk('public')->delete('film/'.$film->image);   
            }


            $filmImage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('film/'.$imageName,$filmImage);
        } else {
            $imageName = $film->image;
        }
       
        $film->name = $request->name;
        $film->slug = $slug;
        $film->description = $request->description;
        $film->release_date = $request->release_date;
        $film->video = $request->video;
        $film->ticket_price = $request->ticket_price;
        $film->rating = $request->rating;
        $film->image = $imageName;
        $film->country = $request->country;
        
        $film->save();
        $film->genres()->sync($request->genres);
       
        
        Toastr::success('Film Successfully Updated :)','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function deleteFilm($film)
    {
       // delete old image
           
        $film = Film::find($film);
        $film->genres()->detach($film);  

        if (storage::disk('public')->exists('film/'.$film->image)) 
            {
               Storage::disk('public')->delete('film/'.$film->image);   
            }
          
        $film->delete();

        Toastr::error('Post Deleted Successfully :)','Deleted');
        return back();
    }
}
