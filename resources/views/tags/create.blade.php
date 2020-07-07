@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		@if(isset($tag))
			@lang('translateproperties.edittag')
		@else
			@lang('translateproperties.createtag')
		@endif
		<!-- {{isset($tag)? 'Edit Tag' : 'Create Tag'}} -->
	</div>

	  @if ($errors->any())
       <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
       </div>
     @endif
	<div class="card-body">
		<form action="{{isset($tag)? route('tags.update',$tag->id):route('tags.store')}}" method="POST">
			@csrf

			@if(isset($tag))
			  @method('PUT')
			@endif

			<div class="form-group">
				<label for="name">@lang('translateproperties.tableusername')</label>
				<input type="text" name="name" class="form-control" value="{{isset($tag)? $tag->name : ''}}">
			</div>

			<div class="form-group">
				<button class="btn btn-success">
					@if(isset($tag))
						@lang('translateproperties.updatetag')
					@else
						@lang('translateproperties.addtag')
					@endif
				<!-- {{isset($tag)?'Update Tag' : 'Add Tag'}} --></button>
			</div>
			
		</form>
	</div>
</div>

@endsection

