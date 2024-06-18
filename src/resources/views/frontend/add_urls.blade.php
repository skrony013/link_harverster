@extends('layouts.frontend_layout')
@section('content')

	<!-- Url Submission form section start from here -->
	<section class="my-5">
		<div class="container">
			<!-- Success Alert Start Here -->
			<div class="row mb-4">
				<div class="col-xl-12 offset">
					@if(session('status'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>{{ session('status') }}</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
				</div>
			</div>
			<!-- Success Alert Ended Here -->
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

@endsection