<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Result Systems -> Storehouse -> Product</title>

	<link href="{{ asset('/resultsystems/storehouse/product/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/resultsystems/storehouse/product/css/bootstrap-submenu.min.css') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
				<a class="navbar-brand" href="#">{{ trans('storehouse-product::product.navigation.brand')}}</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('storehouse-product::product.navigation.product.product')}}<span class="caret"></span></a>
			            @include("storehouse-product::partials.menu-product")
			        </li>
		            <li><a href="{{ url(config('storehouse-product.system_url', '/')) }}">{{ trans('storehouse-product::product.general.back_to_system')}}</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
							<li><a href="/wcli">ENTRAR</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

							@if (isset($_SESSION['Usuario']['Tipo_Usuario']) && $_SESSION['Usuario']['Tipo_Usuario'] == 'adm')
								ROOT
							@else
							{{ ucfirst(current(str_word_count(Auth::user()->parceiro->Nome, 2, 'áàãâäÁÀÃÂÄéèẽêëÉÈẼÊËíìĩîïÍÌĨÎÏóòõôöÓÒÕÔÖúùũûüÚÙŨÛÜýỳỹŷÿÝỲỸŶŸçÇ') ))  }}
							@endif
							<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/wcli/logout.php">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
	 <script src="{{ asset('/resultsystems/storehouse/product/js/bootstrap-submenu.min.js') }}"></script>
<script type="text/javascript">
	$('.dropdown-submenu > a').submenupicker();
</script>

</body>
</html>