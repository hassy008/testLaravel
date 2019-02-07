@extends('admin.admin_master')

@section('title')
Manage Genre
@endsection

@section('mainContent')
<div class="row-fluid">
  <div class="span12">
<!-- BEGIN BASIC PORTLET-->
   <div class="widget orange">
    <div class="widget-title">
        <h4><i class="icon-reorder"></i> Manage Genre </h4>
    <span class="tools">
        <a href="javascript:;" class="icon-chevron-down"></a>
        <a href="javascript:;" class="icon-remove"></a>
    </span>
    </div>
    <div class="widget-body">
    
     @if(session('success'))
<div class="alert alert-success text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('success') }}</b>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('error') }}</b>
</div>
@endif
    <h2 class="text-center text-success">{{Session::get('message')}}</h2>    

        <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
            <tr>
                <th><i class="icon-bullhorn"></i> Genre Id</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i> Genre Name</th>
                
                <th><i class=" icon-edit"></i> Image</th>
                <th><i class="icon-bookmark"></i> Action</th>
                <th></th>
            </tr>
            </thead>  
           <tbody>
<!-- to check data-->
<?php 
//echo '<pre>';
//var_dump($all_genre_info); // print_r($all_genre_info);
    $i=1;
?>

@foreach($all_genres as $v_genre)

    <tr>
        <td><a href="#">{{ $i++ }}</a></td>
        <td class="hidden-phone">{{ $v_genre->genres_name }}</td>
        <td>
            {{-- <img src="{{ asset('public/storage/genre/'.$v_genre->genres_image) }}" alt="" style="width: 80px; height: 50px;"> --}}
            <img src="{{ asset('public/genre/'.$v_genre->genres_image) }}" alt="" style="width: 80px; height: 50px;">
        </td>
        <td>
           
         <a href="{{ url('/edit-genre/'.$v_genre->genres_id) }}" class="btn btn-primary"><i class="icon-pencil"></i></a> 

            <a href="{{ url('/delete-genre/'.$v_genre->genres_id) }}" class="btn btn-danger" onclick="return checkDelete()"><i class="icon-trash "></i></a>
        </td>
    </tr>
       
@endforeach
            </tbody>
        </table>
      </div>
    </div>
<!-- END BASIC PORTLET-->
  </div>
</div>
@endsection
