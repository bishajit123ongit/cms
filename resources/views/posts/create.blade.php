@extends('layouts.app')

@section('content')
<div class="card card-default">
	<div class="card-header">
		{{isset($posts)? 'Update Post' : 'Create Post'}}
	</div>
	<div class="card-body">
		<form action="{{isset($posts) ? route('posts.update',$posts->id) :route('posts.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			@if(isset($posts))
			  @method('PUT')
			@endif
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" id="title" class="form-control" value="{{isset($posts)? $posts->title : ''}}">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" cols="5" rows="5" class="form-control">{{isset($posts)? $posts->description : '' }}</textarea>
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<input id="content" type="hidden" name="content" value="{{isset($posts)? $posts->content : ''}}">
  				<trix-editor input="content"></trix-editor>
			</div>

			<div class="form-group">
				<label for="published_at">Published At</label>
				<input type="text" name="published_at" id="published_at" class="form-control" value="{{isset($posts)? $posts->published_at : ''}}">
			</div>

			@if(isset($posts))
			<div class="form-group">
				<img src="{{asset($posts->image)}}" style="width: 100%;">
			</div>
    
			@endif

			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="image" id="image" class="form-control">
			</div>

			<div class="form-group">
				<label for="category">Catgory</label>
				<select name="category" id="category" class="form-control">
					@foreach($category as $row)
					<option value="{{$row->id}}"
                        @if(isset($posts))
                        @if($row->id == $posts->category_id)
                        selected

                        @endif

                        @endif

						>
						{{$row->name}}
					</option>
					@endforeach
				</select>				
			</div>

			@if($tags->count()>0)
			 <div class="form-group">
			 	<label for="tags">Tags</label>
			 	<select name="tags[]" id="tags" class="form-control tags-selector" multiple>
			 		@foreach($tags as $tag)
                      <option value="{{$tag->id}}"
                       @if(isset($posts))
                         @if($posts->hasTag($tag->id))
                            selected
                         @endif
                     
                       @endif

                      	>
                      	{{$tag->name}}
                      </option>
			 		@endforeach
			 		
			 	</select>
			 </div>


			@endif

			<div class="form-group">
				<button type="submit" class="btn btn-success">
					{{isset($posts)? 'Update Post' : 'Add Post'}}
				</button>
				
			</div>
		</form>
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix-core.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
	flatpickr('#published_at',{
		enableTime:true,
		enableSeconds:true
	});

	$(document).ready(function() {
    $('.tags-selector').select2();
});
</script>
@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection