@extends('admin.admin_master')

@section('title')
Edit genre
@endsection

@section('mainContent')
<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-reorder"></i> Edit Genre</h4>
  	 	  <span class="tools">
  	 	  	<a href="javascript;" class="glyphicon-chevron-down"></a>
  	 	  {{-- 	<a href="javascript;" class="icon-remove"></a> --}}
  	 	  </span>		
  	 	</div>

 	 <div class="widget-body">
 <!--BEGIN FORM-->

@if(session('success'))
<div class="alert alert-success text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('success') }}</b>
</div>
@endif

 	{!!Form::open(['url'=>'/update-genre','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!} 
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Genre Name</label>
 	 	  	<div class="controls">
 	 	  		<input type="text" class="span6" name="genres_name" value="{{ $genre_edit->genres_name }}">	
         <input type="hidden" class="span6" name="genres_id" value="{{ $genre_edit->id }}">
 	 	  	</div>
 	 	  </div>
      
      <div class="control-group">
        <label class="control-label">Genre Image</label>
        <div class="controls">
          <input type="file" class="span3" name="genres_image"> 
          <img src="{{ asset('public/genre/'.$genre_edit->genres_image) }}" alt="" style="width: 80px; height: 50px;">
          <input type="hidden" value="{{ $genre_edit->genres_image }}" name="last_image_path">
        </div>
      </div>


<div class="control-group">
  <div class="span6">
  	<button type="submit" name="btn" class="btn btn-success btn-block">Update Genre Info</button>	
    <button type="submit" name="btn" class="btn btn-danger btn-block">
      <a href="{{ url('/manage-genre') }}" style="text-decoration: none; color: white;">Back</a> 
    </button>
  </div>
</div>


 	 	{!! form::close() !!}
 	   </div>
  		
    </div>

  </div>	
</div>




@endsection