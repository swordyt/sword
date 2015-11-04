<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>
	Sword
	</title>
	<link href="/css/app.css" rel="stylesheet">
	<link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sword</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
					<li><a href="/">前台首页</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="{{URL('/admin')}}">后台首页</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="{{URL('/admin/comments')}}">管理评论</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="{{URL('articles')}}">文章首页</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div>
		@yield('content')
		<div id="footer" style="text-align:center; border-top:dashed 3px #eeeeee;margin:50px 0;padding:20px;">
		©2015 <a href="{{URL('/')}}">sword</a>
		</div>
	</div>
</body>
</html>
