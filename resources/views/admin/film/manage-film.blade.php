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
                <th class="hidden-phone"><i class="icon-question-sign"></i> Description</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i> Rating</th>
                <th><i class="icon-edit"></i> Image</th>
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

@foreach($manage_all_film as $v_film)

    <tr>
        <td><a href="#">{{ $i++ }}</a></td>
        <td class="hidden-phone">{{ $v_film->name }}</td>
        <td class="hidden-phone">{!! str_limit($v_film->description, 60) !!}</td>
        <td class="hidden-phone">{{ $v_film->rating }}</td>
        <td>
            <img src="{{ asset('public/storage/film/'.$v_film->image) }}" alt="" style="width: 80px; height: 50px;"> 
       {{--      <img src="{{ asset('public/film/'.$v_film->image) }}" alt="" style="width: 80px; height: 50px;">--}}
        </td>

        <td>
            <a href="{{ url('/edit-film/'.$v_film->id) }}" class="btn btn-primary"><i class="icon-pencil"></i></a> 
            <a href="{{ url('/delete-film/'.$v_film->id) }}" class="btn btn-danger" onclick="return checkDelete()"><i class="icon-trash "></i></a>
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
