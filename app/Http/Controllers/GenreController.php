<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;
use App\Genre;
use Illuminate\Support\Facades\Redirect; //added by hassy008
session_start();

class GenreController extends Controller
{
   public function addGenre()
   {
   	  $add_genre_page=view('admin.genre.add-genre');

      return view('admin.admin_master')
        ->with('mainContent', $add_genre_page);
   }

   public function saveGenre(Request $request)
   {
   	$this->validate($request, [
   	  'genres_name'   => 'required|unique:genres',
   	  'genres_image' => 'required|mimes:jpg,jpeg,png,bmp'
   	]);

   	$image = $request->file('genres_image');
   	$slug  = str_slug($request->genres_name);
   	if (isset($image)) {
   	  //make unique name for image
   	  $currentDate = Carbon::now()->toDateString();	
   	   $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('genre'))
            {
                Storage::disk('public')->makeDirectory('genre');
            }
//            resize image for category and upload
            $genre = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('genre/'.$imagename,$genre);
            //            check genre slider dir is exists
            if (!Storage::disk('public')->exists('genre/slider'))
            {
                Storage::disk('public')->makeDirectory('genre/slider');
            }
            //            resize image for genre slider and upload
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('genre/slider/'.$imagename,$slider);
        } else {
            $imagename = "default.png";
        }

        //return $request;
        $genre = new Genre();
        $genre->genres_name = $request->genres_name;
        $genre->genres_slug = $slug;
        $genre->genres_image = $imagename;
        $genre->save();
        Toastr::success('genre Successfully Saved :)' ,'Success');
      //  return redirect()->route('admin.genre.index');
   		
   		return back();

   }






}
