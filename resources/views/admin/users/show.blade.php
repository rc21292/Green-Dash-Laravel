@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-8">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-arrow-sep">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">User Management</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-8 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <div class=" d-flex justify-content-between">
          <div class="ms-header-text">
            <h6>{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</h6>
          </div>
          <a href="{{ url()->previous() }}" class="btn btn-outline-dark ms-graph-metrics">{{ trans('global.back_to_list') }}</a>
        </div>
      </div>
      <div class="ms-panel-body">
        <table class="table table-bordered table-striped">
          <tbody>
            <tr>
              <th>
                {{ trans('cruds.user.fields.id') }}
              </th>
              <td>
                {{ $user->id }}
              </td>
            </tr>
            <tr>
              <th>
                {{ trans('cruds.user.fields.name') }}
              </th>
              <td>
                {{ $user->name }}
              </td>
            </tr>
            <tr>
              <th>
                {{ trans('cruds.user.fields.email') }}
              </th>
              <td>
                {{ $user->email }}
              </td>
            </tr>
            <tr>
              <th>
                Roles
              </th>
              <td>
                @foreach($user->roles()->pluck('name') as $role)
                <span class="label label-info label-many">{{ $role }}</span>
                @endforeach
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection