@extends('layouts.frontend_layout')
@section('content')

<!-- show urls section start here -->
<section class="urls-list-section my-5">
	<div class="container">
		@if($urls->count()> 0)
		<div class="row mb-5">
			<div class="col-md-12">
				<form method="GET" action="/urls">
					<div class="row">
						<div class="col-md-4">
							<input class="form-control" type="text" name="search" placeholder="Enter Search URLs..." value="{{ request('search') }}">
						</div>
						<div class="col-md-2">
							<select name="sort_by" class="form-select">
								<option value="created_at" {{ (request('sort_by') == 'created_at') ? 'selected' : '' }}>Date</option>
                        		<option value="url" {{ (request('sort_by') == 'url') ? 'selected' : '' }}>URL</option>
							</select>
						</div>
						<div class="col-md-2">
							<select name="sort_order" class="form-select">
								<option value="desc" {{ (request('sort_order') == 'desc') ? 'selected' : '' }}>Descending</option>
                        <option value="asc" {{ (request('sort_order') == 'asc') ? 'selected' : '' }}>Ascending</option>
							</select>
						</div>
						<div class="col-md-2">
							<button style="width:100%;" class="btn btn-danger" type="submit">Search or Sort</button>
						</div>
						<div class="col-md-2">
							<a href="{{ route('show') }}" style="width:100%;" class="btn btn-dark"><i class="bi bi-arrow-clockwise"></i> Refresh</a>
						</div>
					</div>					
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">					
					<h3 class="text-center"><u>All Urls</u></h3>
					<thead>
						<tr>
							<th>URL</th>
							<th>Domain</th>
							<th>Created At</th>
						</tr>
					</thead>
					<tbody>
						@foreach($urls as $url)
						<tr>
							<td>{{ $url->url }}</td>
							<td>{{ $url->domain->name }}</td>
							<td>{{ $url->created_at }}</td>
						</tr>
						@endforeach						
					</tbody>					
				</table>
				{{ $urls->links() }}
			</div>
		</div>		
		@else
		<div class="row align-items-center">
			<div class="col-md-8">
				<div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
					<strong>No Urls Found!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<div class="col-md-4">
				<a href="{{ route('show') }}" style="width:100%;" class="btn btn-dark"><i class="bi bi-arrow-clockwise"></i> Refresh</a>
			</div>
		</div>
		@endif
	</div>
</section>
<!-- show urls section ended here -->



@endsection