@extends('admin.admin_master')

@section('title')
Add genre
@endsection

@section('mainContent')
<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-reorder"></i> Add Genre</h4>
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

@if(session('error'))
<div class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('error') }}</b>
</div>
@endif
 	 	{!!Form::open(['url'=>'/save-genre','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
 	 	  
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Genre Name</label>
 	 	  	<div class="controls">
 	 	  		<input type="text" class="span6" name="genres_name">	
 	 	  	</div>
 	 	  </div>
 	 	 {{--  <div class="control-group">
 	 	  	<label class="control-label">Genre Description</label>
 	 	  	<div class="controls">
 	 	  		<textarea class="span6" id="richTextBody" rows="4" name="genreDescription"></textarea>
 	 	  	</div>
 	 	  </div> --}}
      
        <div class="control-group">
        <label class="control-label">Genre Image</label>
        <div class="controls">
          <input type="file" class="span3" name="genres_image"> 
        </div>
      </div>

{{--  	 	  <div class="control-group">
 	 	  	<label class="control-label">Publication Status</label>
 	 	  	<div class="controls">
 	 	  		<select name="publicationStatus" class="span3">
 	 	  			<option>Select genre</option>
 	 	  			<option value="1">Publish</option>
 	 	  			<option value="0">Unpublish</option>
 	 	  			
 	 	  		</select>
 	 	  	</div>
 	 	  </div> --}}	

<div class="control-group">
  <div class="span6">
  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Genre Info</button>	
  </div>
</div>


 	 {!! form::close() !!}		
 	 {{-- 	</form> --}}
 	   </div>
  		
    </div>

  </div>	
</div>




@endsection