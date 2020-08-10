@extends('layouts.app')

@section('content')
	<section class="container card">
		<div class="card-body w-50 m-auto">
			<form action="{{ route('login') }}" method="POST">
				@csrf
				<div class="form-group row">
					<div class="col-md-12">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="col-md-12">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" >Login</button>
				</div>
			</form>
		</div>
	</section>
@endsection
