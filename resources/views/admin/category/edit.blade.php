@extends('layouts.app')



@section('content')

		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">Create Category</p>

				@if (Session::has('success'))
					<div class="alert alert-success">
						{{ Session::get('success')}}
					</div>
					
				@endif

				@if (count($errors) > 0)
					<ul class="list-group">

						@foreach ($errors->all() as $error)
							<li class="list-group-item text-danger alert alert-danger">
									{{ $error }}
							</li>
						@endforeach
						
					</ul>
				@endif


			</div>

			
			<div class="panel-body">
				<form action="{{ route('category.update', ['id'=>$category_s->id]) }}"  method="post">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="category_title">Category Title</label>
				<input type="text" name="category" class="form-control" value="{{ $category_s->category }}">

					</div>

					<div class="form-group text-center">
						<button class="btn btn-success">Upade</button>
					</div>
				</form>
			</div>


		</div>

		
		
@endsection