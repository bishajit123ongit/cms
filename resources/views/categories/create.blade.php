@extends('layouts.admin')

@section('content')

<div class="card card-default">
	<div class="card-header">
		  @if(isset($category))
				 @lang('translateproperties.editcategory')
		  @else
				 @lang('translateproperties.createcategory')
		  @endif
	</div>

	  @include('partials.error')
	<div class="card-body">
		<form action="{{isset($category)? route('categories.update',$category->id):route('categories.store')}}" method="POST">
			@csrf

			@if(isset($category))
			  @method('PUT')
			@endif

			<div class="form-group">
				<label for="name">@lang('translateproperties.tableusername')</label>
				<input type="text" name="name" class="form-control" value="{{isset($category)? $category->name : ''}}">
			</div>

			<div class="form-group">
				<button class="btn btn-success">
						@if(isset($category))
						<i style="margin-right:3px;" class="fa fa-pencil-square-o" aria-hidden="true"></i>
							 @lang('translateproperties.updatecategory')
					  	@else
						  <i style="margin-right:3px;"class="fa fa-plus-circle" aria-hidden="true"></i>
							 @lang('translateproperties.addcategory')
					  	@endif
			  </button>
			</div>
			
		</form>
	</div>
</div>

@endsection

