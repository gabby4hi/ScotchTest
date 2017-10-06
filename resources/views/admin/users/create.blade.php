@extends('layouts.app')



@section('content')

		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">Create User</p>

				@if (Session::has('success'))
					<div class="alert alert-success">
						{{ Session::get('success')}}
					</div>
					
				@endif

				@include('layouts.errors')


			</div>

			
			<div class="panel-body">
				<form action="{{ route('users.store') }}"  method="post">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="category_title">Users Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter  Name Here">

					</div>
					<div class="form-group">
						<label for="category_title">Users Email</label>
						<input type="email" name="email" class="form-control" placeholder="Enter Email">

					</div>

					<div class="form-group text-center">
						<button class="btn btn-success">Add User</button>
					</div>
				</form>
			</div>


		</div>

		
		
@endsection