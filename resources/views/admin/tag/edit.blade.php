@extends('layouts.app')



@section('content')

		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">Edit Tag: {{ $tag->tag }}</p>

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
				<form action="{{ route('tag.update', ['id'=>$tag->id]) }}"  method="post">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="category_title">Tag Title</label>
				<input type="text" name="tag" class="form-control" value="{{ $tag->tag }}">

					</div>

					<div class="form-group text-center">
						<button class="btn btn-success">Upade</button>
					</div>
				</form>
			</div>


		</div>

		
		
@endsection