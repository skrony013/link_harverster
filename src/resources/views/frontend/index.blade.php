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
</head>
<body>
	<!-- Header section Start from here -->
	<header style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="">
							<img src="https://ronyahmed.xyz/upload/service/url_harvester.png" alt="" style="width:150px;">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button> 

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ms-auto">
								<li class="nav-item">
									<a class="btn btn-danger" href="">View Url list</a>
								</li>  
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header Section Ended Here -->

	<!-- Url Submission form section start from here -->
	<section class="my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="https://ronyahmed.xyz/upload/about/1713288953.png" class="img-fluid" alt="">
				</div>
				<div class="offset-1 col-md-7 p-4" style="box-shadow: 0 0 13px 0 rgba(82, 63, 105, .05); border-radius:20px;">
					<div x-data="{ urls: '' }">
						<h3>Submit URLs</h3>
						<form method="POST" action="{{ route('submit.urls') }}">
							@csrf
							<textarea placeholder="Enter URLs, each on a new line..." class="form-control" x-model="urls" name="urls" rows="10" cols="100"></textarea>
							<div class="mt-2 text-danger">@error('urls') {{ $message }} @enderror</div>
							<button style="width:100%;" class="btn btn-danger mt-2" type="submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Url Submission form section ended here -->

	<!-- Footer Section Start from here -->
	<footer class="py-3"  style="border-top:1px dashed #ddd;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright-text-two text-center">
						<p>Copyright © 2024 - <span><a href=""><b>URL Harvester</b></a></span> | All Rights Reserved</p>
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