@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增 Article</div>
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
				
				<form action="{{URL('articles')}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					Title:<input type="text" name="title" class="form-control" required="required" />
					<br/>
					Slug:<input type="text" name="title" class="form-control" required="required" />
					<br/>
					Image:<input type="file" name="file" value="上传">
					Body:<textarea name="body" rows="10" class="form-control" required="required"></textarea>
					<br/>
					<input type="submit" value="新增" />
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
@endsection