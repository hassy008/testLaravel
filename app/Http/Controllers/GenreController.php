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
use DB;
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

   	 try {
        $data = array();
        $data['genres_name']  = $request->genres_name ;
        $slug                 = str_slug($request->genres_name);
        $data['genres_slug']  = $slug ;
        

//----------------START IMAGE UPLOAD--------------//
        $image=$request->file('genres_image');
        if ($image) {
          $file_size=$image->getClientSize();
          $name= str_random(20);
          $extension = $image->getClientOriginalExtension();
          $image_name= $name.'.'.$extension;
          $upload_path='public/genre/';
          //------------check image format------------//
          if ($extension == 'jpg' || $extension == 'png' ||$extension == 'jpeg' ) {
            //-------check file size-------//
            if ($file_size<51200000) {
              $success = $image->move($upload_path, $image_name);
              $data['genres_image'] = $image_name;
              $result = DB::table('genres')
                      ->insert($data);
              } else{
                  exit();
                  return redirect::to('add-genre')->with('error', 'Max file size not more than 5MB');
              }
          }
          else {
            return redirect::to('add-genre')->with('error', 'You have to put right file type( jpg/png/jpeg ) only');
          }
        }
        else{
            $result = DB::table('genres')
                     ->insert($data);
        }
        //--------End Image Upload------//
        if ($result) {
          return redirect::to('add-genre')->with('success', 'Upload New genre');
        } else {
          return redirect::to('add-genre')->with('error', 'Some Error');
        }
    } catch (\Exception $e) {
         $err_msg= \Lang::get($e->getMsg());
        return redirect::to('add-genre')->with('error', $err_msg);
        }
    //    Toastr::success('New Genre Successfully Saved :)' ,'Success');
    
   		
   		return back();

   }

   public function manageGenre()
   {
   	  $all_genres=DB::table('genres')
    				->get();

      $manage_genres_page=view('admin.genre.manage-genre')
    			->with('all_genres', $all_genres);
      return view('admin.admin_master')
    		->with('mainContent', $manage_genres_page);
   }

   public function editGenre($id)
   {
      $genre_edit=DB::table('genres')
            ->where('genres_id', $id)
            ->first();

        $edit_genres_page=view('admin.genre.edit-genre')
            ->with('genre_edit', $genre_edit);
        return view('admin.admin_master')
            ->with('mainContent', $edit_genres_page);
   }

   public function updateGenre(Request $request)
    {
     $this->validate($request, [
   	  'genres_name'   => 'required',
   	//  'genres_image' => 'mimes:jpg,jpeg,png,bmp'
   	]);

      try {
        $data = array();
        $data['genres_name']  = $request->genres_name ;
        $slug                 = str_slug($request->genres_name);
        $data['genres_slug']  = $slug ;
        

//----------------START IMAGE UPLOAD--------------//
          $image=$request->file('genres_image');
        if ($image) {
          $file_size=$image->getClientSize();
          $name= str_random(20);
          $extension = $image->getClientOriginalExtension();
          $image_name= $name.'.'.$extension;
          $upload_path='public/genre/';
          //------------check image format------------//
          if ($extension == 'jpg' || $extension == 'png' ||$extension == 'jpeg' ) {
            //-------check file size-------//
            if ($file_size<51200000) {
              $success = $image->move($upload_path, $image_name);
              if ($request->last_image_path) {
                $old_image_path= $request->last_image_path;
                unlink('public/genre/'.$old_image_path);
              }
              $data['genres_image'] = $image_name;
              $result = DB::table('genres')
                        ->where('genres_id', $request->genres_id)
                        ->update($data);
              } else{
                  exit();
                  return redirect::to('edit-genre')->with('error', 'Max file size not more than 5MB');
              }
          }
          else {
            return redirect::to('edit-genre')->with('error', 'You have to put right file type( jpg/png/jpeg ) only');
          }
        }
        else{
            $data['genres_image'] = $request->last_image_path;
            $result = DB::table('genres')
                      ->where('genres_id', $request->genres_id)
                      ->update($data);
        }
        //--------End Image Upload------//
        if ($result) {
          return redirect::to('edit-genre/'.$request->genres_id)->with('success', 'Update genre Successfully');
        } else {
          return redirect::to('edit-genre/'.$request->genres_id)->with('error', 'Some Error');
        }
    } catch (\Exception $e) {
        $err_msg= \Lang::get($e->getMsg());
        return redirect::to('edit-genre/'.$request->genres_id)->with('error', $err_msg);
        }

    } 

    public function deleteGenre($genres_id)
    {
       DB::table('genres')
        ->where('genres_id', $genres_id)
        ->delete();
       // return redirect::to('/manage-product');
      return back()->with('error', 'Genre Deleted Successfully');
    }







}
