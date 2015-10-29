@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">我的文章</div>
		<div style="padding:5px; font-size:16px;">{{Inspiring::quote()}}</div>
        <div class="panel-body">

       

          @foreach ($articles as $article)
            <hr>
            <div class="page">
              <h4>{{ $article->title }}</h4>
              <div class="content">
                <p>
                  {{ $article->body }}
                </p>
              </div>
            </div>
            <a href="{{ URL('user/articles/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
          @endforeach
		  		  <br>
		  <hr>
		<a href="{{ URL('user/articles') }}" class="btn btn-lg btn-primary">新增</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection