@extends('_layouts.default')
@section('content')
	<div id="title" style="text-align:center;">
		<h1>Sword</h1>
		<div style="padding:5px; font-size:16px;">{{Inspiring::quote()}}</div>
				<br>
		<a href="user/articles"><strong>发表文章</strong></a>
		<a href="user/articles/MyArticles"><strong>我的文章</strong></a>
		<hr>
		<div>
			<ul>
			@foreach ($articles as $article)
			<li style="margin: 50px 0;">
				<div class="title">
					<a href="{{ URL('articles/'.$article->id) }}">
						<h4>{{ $article->title}}</h4>
					</a>
				</div>
				<div class="body">
					<p>{{ $article->body }}</p>
				</div>
				<div >
					<p><image src="{{ app_path().'/storage/uploads/'.$article->image}}" /></p>
				</div>
			</li>
			@endforeach
			</ul>
		</div>
	</div>
@endsection