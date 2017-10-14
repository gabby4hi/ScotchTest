@extends('layouts.app')



@section('content')

		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">Update Profile  </p>

				@if (Session::has('success'))
					<div class="alert alert-success">
						{{ Session::get('success')}}
					</div>
					
				@endif

				@include('layouts.errors')


			</div>

			
			<div class="panel-body">
				<form action="{{ route('user.profile.update') }}"  method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="category_title">Enter Name  </label>
						<input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter  Name Here">

					</div>
					<div class="form-group">
						<label for="category_title">Users Email</label>
						<input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter Email ">

					</div>
					<div class="form-group">
						<label for="category_title">New Password </label>
						<input type="password" name="password" class="form-control" placeholder="Enter Password">

					</div>

					<div class="form-group">
						<label for="category_title">Upload New Avatar</label>
						<input type="file" name="avatar" class="form-control" placeholder="Enter Email">

					</div>
					<div class="form-group">
						<label for="category_title">Facebook Profile</label>
						<input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}" placeholder="Enter Email">

					</div>
					<div class="form-group">
						<label for="category_title">Youtube Profile</label>
						<input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}" placeholder="Enter Email">

					</div>
					<div class="form-group">
						<label for="category_title">About</label>
						<textarea id="about" name="about" cols="6" rows="6" class="form-control"></textarea>

					</div>

					<div class="form-group text-center">
						<button class="btn btn-success">Submit </button>
					</div>
				</form>
			</div>


		</div>

		
		
@endsection