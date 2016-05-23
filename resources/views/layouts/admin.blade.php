<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel customer API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="/css/jquery.dynatable.css">
    <link rel="stylesheet" href="/css/alertify.default.css">
    
    
    
    <script type="text/javascript" src="{{ URL::asset('js/jquery-1.7.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/alertify.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.dynatable.js') }}"></script>
    
    @yield('header')
    
</head>

<body>
    <div class="adminHeader">
		<a href="#" id="logo"></a>
		<nav id="adminNavigation">
			<a href="#" id="menu-icon"></a>
			<ul>
			<?php 
    			$menuArray = Array();
    			$menuArray[] = Array("name"=>"Hjem","url"=>"/admin/hjem");
    			$menuArray[] = Array("name"=>"Videoer","url"=>"/admin/video");
    			$menuArray[] = Array("name"=>"Kategorier","url"=>"/admin/kategori");
			?>
				@foreach ($menuArray as $menu) 
				    <li><a href="{{ $menu['url'] }}">{{ $menu["name"] }}</a></li>
				@endforeach
				<li><a href="/logout">Logg ut</a></li>
			</ul>
		</nav>
	</div>
	<section>
    @yield('content')
    </section>
    @yield('footer')
    
    <script>
        jQuery(document).ready(function() {
            @yield('postJquery');
        });
    </script>
</body>

</html>

