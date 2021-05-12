@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-8">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-arrow-sep">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">User Management</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-8 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header bg-info">
        <div class=" d-flex justify-content-between">
          <div class="ms-header-text">
            <h6>{{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</h6>
          </div>
          <button type="submit" class="btn btn-outline-dark ms-graph-metrics" name="button" form="user-form">{{ trans('global.save') }} {{ trans('cruds.user.title_singular') }}</button>
        </div>
      </div>
      <div class="ms-panel-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data" class="needs-validation clearfix" novalidate="" id="user-form">
          @csrf
          <div class="form-row">
            <div class="col-md-12">
              <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
              <div class="input-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                <div class="invalid-feedback">
                 {{ $errors->first('name') }}
               </div>
               @endif
             </div>
           </div>
           <div class="col-md-12">
            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
            <div class="input-group">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email Address"  value="{{ old('email', isset($user) ? $user->email : '') }}">
              @if($errors->has('email'))
              <div class="invalid-feedback">
               {{ $errors->first('email') }}
             </div>
             @endif
           </div>
         </div>
         <div class="col-md-12">
          <label for="{{ trans('cruds.user.fields.password') }}">Password</label>
          <div class="input-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            @if($errors->has('password'))
            <div class="invalid-feedback">
             {{ $errors->first('password') }}
           </div>
           @endif
         </div>
       </div>
       <div class="col-md-12">
        <label for="roles">{{ trans('cruds.user.fields.roles') }}*</label>
        <div class="input-group">
          <select name="roles[]" class="form-control" id="roles" required="">
            <option value="" selected>Please select role</option>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
            @endforeach
          </select>
          @if($errors->has('roles'))
          <div class="invalid-feedback">
           {{ $errors->first('roles') }}
         </div>
         @endif
       </div>
     </div>
     <div class="col-md-4 pt-2">
      <label class="ms-switch">
        <input type="checkbox" checked="" name="status">
        <span class="ms-switch-slider ms-switch-primary square"></span>
      </label>
      <span> Enable </span>
    </div>    
  </div>
</form>
</div>
</div>
</div>
</div>
@endsection