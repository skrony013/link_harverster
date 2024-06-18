<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>URL Harvester!</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="https://ronyahmed.xyz/upload/service/url_harvester.png">
	<!-- Bootstrap css cdn here -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap Icons -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<style>
		.shadow-sm{
			display: none;
		}
		.leading-5{
			margin-top: 7px;
		}
	</style>
</head>
<body>
	<!-- Header section Start from here -->
	<header style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="{{ route('index') }}">
							<img src="https://ronyahmed.xyz/upload/service/url_harvester.png" alt="" style="width:150px;">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button> 

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ms-auto">
								<li class="nav-item">
									<a class="btn btn-success" href="{{ route('show') }}">View Url list</a>
								</li>  
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header Section Ended Here -->

	@yield('content')

	<!-- Footer Section Start from here -->
	<footer class="py-3"  style="border-top:1px dashed #ddd;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright-text-two text-center">
						<p>Copyright © 2024 - <span><a href="{{ route('index') }}"><b>URL Harvester</b></a></span> | All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Section Ended Here -->
    <!-- Bootstrap Js CDN Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Alpine Js CDN Here -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>