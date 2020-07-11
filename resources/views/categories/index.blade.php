@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{route('categories.create')}}" class="btn btn-success">@lang('translateproperties.addcategory')</a>
</div>
<div class="card card-default">
	<div class="card-header">
		@lang('translateproperties.cat')
	</div>

	<div class="card-header">
	@if($categories->count()>0)
	<table class="table">
		  <thead>
		  	<th>@lang('translateproperties.tableusername')</th>
		  	<th>@lang('translateproperties.po')</th>
		  	<th></th>
		  </thead> 
		  <tbody>
		  	@foreach($categories as $category)
		  	<tr>
		  		<td>{{$category->name}}</td>
		  		<td>
		  			{{$category->post()->count()}}
		  		</td>
		  		<td>
		  			<a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm ">@lang('translateproperties.btnedit')</a>
		  			<button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">@lang('translateproperties.btndelete')</button>
		  		</td>
		  	</tr>
		  	@endforeach
		  </tbody>
			
		</table>
	@else
      <h3 class="text-center">@lang('translateproperties.nocategoryyet')</h3>
	@endif

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="" method="POST" id="deleteCategoryForm">
  	@csrf
  	@method('DELETE')
	    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">@lang('translateproperties.tablepostcategory')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center text-blod"> @lang('translateproperties.categorydeletewarningmsg')</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> @lang('translateproperties.deletecancel')</button>
        <button type="submit" class="btn btn-danger">@lang('translateproperties.deleteconfirm')</button>
      </div>
    </div>
</form>
  </div>
</div>

	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	function handleDelete(id)
	{
		var form=document.getElementById('deleteCategoryForm');
		form.action='categories/'+id
		$('#deleteModal').modal('show');
	}
</script>

@endsection