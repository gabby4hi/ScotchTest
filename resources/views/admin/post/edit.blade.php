@extends('layouts.app')



@section('content')

		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">Edit : {{ $post->title }}</p>

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
				<form action="{{ route('post.update', ['id' => $post->id]) }}"  method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{ $post->title }}">
					</div>
					<div class="form-group">
						<label for="SelectCategory">Select Category</label>
						
							
						
						<select name="category" class="form-control">
							@foreach ($category as $categories)
							<option value="{{ $categories->id }}"
									
									@if ($post->category->id == $categories->id)
										selected
									@endif



								> {{ $categories->category }}</option>
							@endforeach
						</select>

						
					</div>


					<div class="form-group">
						<label for="featured">Featured Image</label>
						<input type="file" name="featured" class="form-control"></input>
					</div>

					<div class="form-group">

						<span class="label label-default ">Select Tags: </span>
						@foreach ($tags as $tag)
				<div class="checkbox">
						 
					<label for="Tags"><input name="tags[]" type="checkbox" value="{{ $tag->id }}"
									
									@foreach ($post->tags as $t)
										
										@if ($tag->id == $t->id)
											
											checked

										@endif


									@endforeach
	


									>{{ $tag->tag }} </input></label>
				</div>
						@endforeach
					</div>

					<div class="form-group">
						<label for="content">Content</label>
					<textarea name="content" id="content" class="form-control" cols="5" rows="5">{{ $post->content }}</textarea>
					</div>

					<div class="form-group">
						<div class="text-center">
							<button class="btn btn-success" type="submit">
								Update Post
							</button>
						</div>
					</div>

				</form>
			</div>


		</div>

		
		
@endsection