@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{route('posts.create')}}" class="btn btn-success">@lang('translateproperties.addpost')</a>
</div>

<div class="card card-default">
<div class="card-header">
		@lang('translateproperties.posts')
</div>
<div class="card-body">
	@if($posts->count() > 0)
	
        <table class="table">
		  <thead>
		  	<th>@lang('translateproperties.tableuserimage')</th>
		  	<th>@lang('translateproperties.tableposttitle')</th>
		  	<th>@lang('translateproperties.tablepostcategory')</th>
		  	<th></th>
		  	<th></th>
		  </thead> 
		  <tbody>
		  	@foreach($posts as $post)
		  	<tr>
		  		<td>
		  			<img style="width: 150px; height: 70px;" src="{{URL::to($post->image)}}" alt="">
		  		</td>
		  		<td>
		  			{{$post->title}}
		  		</td>
		  		<td>
		  		   <a href="{{route('categories.edit',$post->category->id)}}">{{$post->category->name}}</a>
		  		</td>
		  		@if($post->trashed())
               <td>
               <form action="{{route('posts.restore',$post->id)}}" method="POST">
               	@csrf
               	@method('PUT')
               	<button type="submit" class="btn btn-info btn-sm">@lang('translateproperties.postrestore')</button>
               </form>
               </td>
               @else
				<td>
		  			<a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">@lang('translateproperties.btnedit')</a>
		  		</td>
		  		@endif
		  		<td>
		  			<form action="{{route('posts.destroy',$post->id)}}" method="POST">
		  				@csrf
		  				@method('DELETE')
		  				<button type="submit" class="btn btn-danger btn-sm">
		  					@if($post->trashed())
		  					 @lang('translateproperties.btndelete')
		  					@else
		  					 @lang('translateproperties.tableposttrash')
		  					@endif

		  				</button>
		  			</form>
		  		</td>
		  	</tr>
		  	@endforeach
		  </tbody>
	
	@else
      <h3 class="text-center">@lang('translateproperties.nopostyetmsg')</h3>
	@endif
</div>

</div>


@endsection