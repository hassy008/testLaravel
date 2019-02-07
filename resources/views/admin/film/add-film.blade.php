@extends('admin.admin_master')

@section('title')
Add Film
@endsection

@section('mainContent')


<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-reorder"></i> Add Film</h4>
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
 	 	{!!Form::open(['url'=>'/save-film','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
 	 	  
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Film Name</label>
 	 	  	<div class="controls">
 	 	  		<input type="text" class="span6" name="name">	
 	 	  	</div>
 	 	  </div>
 	 	 <div class="control-group">
 	 	  	<label class="control-label">Film Description</label>
 	 	  	<div class="controls">
 	 	  		<textarea class="ckeditor" rows="4" name="description"></textarea>
 	 	  		{{-- <textarea class="span6" id="richTextBody" rows="4" name="description"></textarea> --}}
 	 	  	</div>
 	 	  </div>
 	 	   <div class="control-group">
 	  	<label class="control-label">Release Date</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="release_date" min="1">	
 	  	</div>
 @if ($errors->has('release_date'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('release_date') }}</strong>
</span>
@endif 	  
    </div>
 	 	  <div class="form-group">
 	 	  	<label class="control-label">Genre</label>
 	 	  	<div class="controls  {{ $errors->has('genres')? 'focused error' : ''}}">
 	 	  		<select name="genres[]" id="genres" class="form-control show-tick" multiple>
 	 	  			<option>Select Genre</option>
 	 	  			@foreach($genres as $genre)
 	 	  			  <option value="{{ $genre->id }}">{{ $genre->genres_name }}</option>
 	 	  			@endforeach 
 	 	  		</select>
 	 	  	</div>
 	 	  </div>

 	<div class="control-group">
 	  	<label class="control-label">Ticket Price</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="ticket_price" min="1">	
 	  	</div>
 @if ($errors->has('ticket_price'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('ticket_price') }}</strong>
</span>
@endif 	  
    </div>
    <div class="control-group">
 	  	<label class="control-label">Rating</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="rating">	
 	  	</div>
 @if ($errors->has('rating'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('rating') }}</strong>
</span>
@endif 	  
    </div>
     <div class="control-group">
 	  	<label class="control-label">Country</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="country" min="1">	
 	  	</div>
 @if ($errors->has('country'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('country') }}</strong>
</span>
@endif 	  
    </div>
      
        <div class="control-group">
        <label class="control-label">Film Image</label>
        <div class="controls">
          <input type="file" class="span3" name="image"> 
        </div>
      </div>

 	 	   

<div class="control-group">
  <div class="span6">
  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Film Info</button>	
  </div>
</div>


 	 {!! form::close() !!}		
 	 {{-- 	</form> --}}
 	   </div>
  		
    </div>

  </div>	
</div>


    <!-- Select Plugin Js -->
    <script src="{{ asset('public/admin/bootstrap-select.js') }}"></script>
    





@endsection