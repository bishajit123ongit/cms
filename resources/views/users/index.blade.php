@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">
		@lang('translateproperties.users')
</div>
<div class="card-body">
	@if($users->count() > 0)
	
        <table class="table">
		  <thead>
		  	<th>@lang('translateproperties.tableuserimage')</th>
		  	<th>@lang('translateproperties.tableusername')</th>
		  	<th>@lang('translateproperties.tableuseremail')</th>
		  	<th></th>
		  	<th></th>
		  </thead> 
		  <tbody>
		  	@foreach($users as $user)
		  	<tr>
		  		<td>
		  		  <img src="{{ get_gravatar($user->email)}}" style="width: 60px; height: 60px; border-radius: 50%;">
		  		</td>
		  		<td>
		  			{{$user->name}}
		  		</td>
		  		<td>
		  		  {{$user->email}}
		  		</td>
		      
                <td>
                @if(!$user->isAdmin())
                   <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                   	@csrf
                    	<button type="submit" class="btn btn-success btn-sm">@lang('translateproperties.tableusermakeadmin')</button>
                   </form>
                @endif
		  		</td>
		  		
		  	</tr>
		  	@endforeach
		  </tbody>
	
	@else
      <h3 class="text-center">@lang('translateproperties.nouseryet')</h3>
	@endif
</div>

</div>


@endsection