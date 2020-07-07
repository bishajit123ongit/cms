@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">@lang('translateproperties.userprofile')</div>

               @include('partials.error')
                <div class="card-body">

                   <form action="{{route('users.update-profile')}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">@lang('translateproperties.tableusername')</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="about">@lang('translateproperties.useraboutme')</label>
                        <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
                        
                    </div>

                    <button type="submit" class="btn btn-success">@lang('translateproperties.userbtnupdate')</button>
                       
                   </form>
                </div>
            </div>
  
@endsection
