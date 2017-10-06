@extends('layouts.app')



@section('content')

		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">Create Tag</p>

				@if (Session::has('success'))
					<div class="alert alert-success">
						{{ Session::get('success')}}
					</div>
					
				@endif

				@include('layouts.errors')


			</div>

			
			<div class="panel-body">
				<form action="{{ route('tag.store') }}"  method="post">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="category_title">Tag Title</label>
						<input type="text" name="tag" class="form-control" placeholder="Enter Tag Name Here">

					</div>

					<div class="form-group text-center">
						<button class="btn btn-success">Submit</button>
					</div>
				</form>
			</div>


		</div>

		
		
@endsection