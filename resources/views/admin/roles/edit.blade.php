@extends('layouts.master')
@section('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
  <div class="col-md-8">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-arrow-sep">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">User Management</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">{{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}</li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-8 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header bg-info">
        <div class=" d-flex justify-content-between">
          <div class="ms-header-text">
            <h6>{{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}</h6>
          </div>
          <button type="submit" class="btn btn-outline-dark ms-graph-metrics" name="button" form="role-form">{{ trans('global.update') }} {{ trans('cruds.role.title_singular') }}</button>
        </div>
      </div>
      <div class="ms-panel-body">
        <form action="{{ route("admin.roles.update", $role->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation clearfix" novalidate="" id="role-form">
          @csrf
          @method('PUT')
          <div class="form-row">
            <div class="col-md-12">
              <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
              <div class="input-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name', isset($role) ? $role->name : '') }}">
                @if($errors->has('name'))
                <div class="invalid-feedback">
                 {{ $errors->first('name') }}
               </div>
               @endif
             </div>
           </div>
           <div class="col-md-12">
            <label for="permission">{{ trans('cruds.role.fields.permissions') }}*</label>
            <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
              @foreach($permissions as $permission)
              <option value="{{ $permission->id }}" @if(in_array($permission->id, $selected_permissions)) selected="" @endif>{{ $permission->name }}</option>
              @endforeach
            </select>
            @if($errors->has('permission'))
            <em class="invalid-feedback">
              {{ $errors->first('permission') }}
            </em>
            @endif
            <p class="helper-block">
              {{ trans('cruds.role.fields.permissions_helper') }}
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2({
      tags: true,
      width:640.65,
      tokenSeparators: [',', ' ']
    });
  });
</script>
@endpush