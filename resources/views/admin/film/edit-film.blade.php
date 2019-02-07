@extends('admin.admin_master')

@section('title')
Edit Film
@endsection

@section('mainContent')


<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-reorder"></i> Edit Film</h4>
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
 	 	{!!Form::open(['url'=>'/update-film','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
 	 	  
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Film Name</label>
 	 	  	<div class="controls">
 	 	  		<input type="text" class="span6" name="name" value="{{ $FilmById->name }}">	
          <input type="text" class="span6" name="id" value="{{ $FilmById->id }}">
 	 	  	</div>
 	 	  </div>
 	 	 <div class="control-group">
 	 	  	<label class="control-label">Film Description</label>
 	 	  	<div class="controls">
 	 	  		<textarea class="ckeditor" rows="4" name="description">{{ $FilmById->description }}</textarea>
 	 	  		{{-- <textarea class="span6" id="richTextBody" rows="4" name="description"></textarea> --}}
 	 	  	</div>
 	 	  </div>
 	 	   <div class="control-group">
 	  	<label class="control-label">Release Date</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="release_date" min="1"  value="{{ $FilmById->release_date }}">	
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
 	 	  			  <option 
                @foreach($FilmById->genres as $showGenre)
                  {{ $showGenre->id == $genre->id? 'selected':'' }}
                @endforeach   
                  value="{{ $genre->id }}">{{ $genre->genres_name }}
                  }
              
              </option>
 	 	  			@endforeach 
 	 	  		
          </select>
 	 	  	</div>
 	 	  </div>

 	<div class="control-group">
 	  	<label class="control-label">Ticket Price</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="ticket_price" min="1"   value="{{ $FilmById->ticket_price }}">	
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
 	  		<input type="text" class="span6" name="rating"  value="{{ $FilmById->rating }}">	
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
 	  		<input type="text" class="span6" name="country" min="1"  value="{{ $FilmById->country }}">	
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
          <img src="{{ asset('public/storage/film/'.$FilmById->image) }}" alt="" style="width: 80px; height: 50px;">
          <input type="hidden" value="{{ $FilmById->image }}" name="last_image_path">
        </div>
      </div>

 	 	   

<div class="control-group">
  <div class="span6">
  	<button type="submit" name="btn" class="btn btn-success btn-block">Update Film Info</button>	
    <button type="submit" name="btn" class="btn btn-danger btn-block">
        <a href="{{ url('/manage-film') }}" style="text-decoration: none; color: white;">Back</a> 
    </button>
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