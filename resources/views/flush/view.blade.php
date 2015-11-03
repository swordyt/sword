@extends('app')
@section('content')

@if( count($errors) > 0)
	
		<ul>
			<li>
			{{var_dump($errors)}}
			</li>
		</ul>

@endif
<form action="{{url('flush')}}" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	name:<input type="text" name="name" class="form-control" style="width: 300px;"/>
	password:<input type="password" name="password" class="form-control" style="width: 300px;"/>
	url:<input type="text" name="url" class="form-control" style="width: 300px;" />

	email:<input type="text" name="email" class="form-control" style="width: 300px;"/>
	callback:<select name="acptNotice" >
			<option value="true" selected="selected">ture</option>
			<option value="false"> false</option>
		</select>
	<br>
	urls:<textarea  name="urls" required="required" rows="3" class="form-control" ></textarea>



	dirs:<textarea  name="dirs" required="required" rows="3" class="form-control"></textarea>


<input type="submit" value="刷新">
</form>
@endsection