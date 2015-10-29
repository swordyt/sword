﻿@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑 Article</div>
			<div class="panel-body">
			@if(count($errors) >0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br/>
					<ul>
						@foreach($errors->all as $error)
							<li>
							{{$error}}
							</li>
						@endforeach
					</ul>
				</div>
				@endif
				
				<form action="{{URL('user/articles').'/'.$article->id}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="hidden" name="_method" value="put">
					<input type="hidden" name="user_id" value="{{$article->user_id}}">
					Title:<input type="text" name="title" class="form-control" required="required" value="{{$article->title}}"/>
					<br/>
					Slug:<textarea name="slug" rows="3" class="form-control" required="required">{{$article->slug}}</textarea>
					<br>
					Image:<input type="file" name="image" class="form-control" value="{{$article->image}}">
					<br>
					<textarea name="body" rows="10" class="form-control" required="required">{{$article->body}}</textarea>
					<br/>
					<input type="submit" value="发表" />
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
@endsection
