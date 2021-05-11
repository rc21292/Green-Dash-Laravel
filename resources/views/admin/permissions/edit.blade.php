@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-8">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-arrow-sep">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">User Management</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">{{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}</li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-8 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header bg-info">
        <div class=" d-flex justify-content-between">
          <div class="ms-header-text">
            <h6>{{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}</h6>
          </div>
          <button type="submit" class="btn btn-outline-dark ms-graph-metrics" name="button" form="role-form">{{ trans('global.save') }} {{ trans('cruds.permission.title_singular') }}</button>
        </div>
      </div>
      <div class="ms-panel-body">
        <form action="{{ route("admin.permissions.update", $permission->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation clearfix" novalidate="" id="role-form">
          @csrf
          @method('PUT')
          <div class="form-row">
            <div class="col-md-12">
              <label for="name">{{ trans('cruds.permission.fields.title') }}*</label>
              <div class="input-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name', isset($permission) ? $permission->name : '') }}">
                @if($errors->has('name'))
                <div class="invalid-feedback">
                 {{ $errors->first('name') }}
               </div>
               @endif
             </div>
           </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')

@endpush