<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laravel中的模板继承 @yield('title')</title>
	<style type="text/css">
		.header{
			width: 300px;
			height: 100px;
			border:1px solid #000;
		}
		.footer{
			width: 300px;
			height: 100px;
			border:1px solid #000;
		}
		.content{
			width: 500px;
			height: 300px;
			border:1px solid #000;
		}
	</style>
</head>
<body>
<div class="header">
	@section('header')
	公共头部
	@show
</div>
<div class="content">
	@yield('content','主要内容')
</div>
<div class="footer">
	@section('footer')
	公共底部
	@show
</div>
</body>
</html>