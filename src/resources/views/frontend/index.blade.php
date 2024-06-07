<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>URL Harvester!</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<section class="my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div x-data="{ urls: '' }">
						<form method="POST" action="">
							@csrf
							<textarea class="form-control" x-model="urls" name="urls" rows="20" cols="100"></textarea>
							<button class="btn btn-primary mt-2" type="submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- Bootstrap Js CDN Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Alpine Js CDN Here -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>