@extends('layouts.app')

@section('content')
	<section class="container card">
		<h4 class="card-title">Register</h4>
		<div class="card-body w-50 m-auto">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{ route('register') }}" method="POST">
				@csrf
				<div class="form-group row">
					<div class="col-md-12">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
					</div>
					<div class="col-md-12">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
					</div>
					<div class="col-md-12">
						<label>Email Confirmation</label>
						<input type="email" name="email_confirmation" class="form-control" value="{{ old('email_confirmation') }}" required>
					</div>
					<div class="col-md-12">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="col-md-12">
						<label>Password Confirmation</label>
						<input type="password" name="password_confirmation" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Register</button>
				</div>
			</form>
		</div>
	</section>
@endsection
