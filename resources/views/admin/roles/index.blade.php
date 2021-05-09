@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-arrow-sep">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">User Management</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}</li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <div class=" d-flex justify-content-between">
          <div class="ms-header-text">
            <h6>{{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}</h6>
            <p>All User Roles of this Application are listed here</p>
          </div>
          <a href="{{ route('admin.roles.create') }}" class="btn btn-outline-dark ms-graph-metrics" name="button">{{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}</a>
        </div>
      </div>
      <div class="ms-panel-body">
        <div class="table-responsive">
          <table class="table thead-info">
            <thead>
              <tr>
                <th scope="col">{{ trans('cruds.role.fields.id') }}</th>
                <th scope="col">{{ trans('cruds.role.fields.title') }}</th>
                <th scope="col">{{ trans('cruds.role.fields.permissions') }}</th>
                <th scope="col">{{ trans('global.action') }}</th>
              </tr>
            </thead>
            <tbody>
             @foreach($roles as $key => $role)
             <tr data-entry-id="{{ $role->id }}">
              <td>
                {{ $role->id ?? '' }}
              </td>
              <td>
                {{ $role->name ?? '' }}
              </td>
              <td>
                @foreach($role->permissions()->pluck('name') as $permission)
                <span class="badge badge-info">{{ $permission }}</span>
                @endforeach
              </td>
              <td>
                <a href="{{ route('admin.roles.show', $role->id) }}">
                  <i class="fa fa-eye ms-text-secondary"></i>
                </a>
                <a href="{{ route('admin.roles.edit', $role->id) }}">
                  <i class="fas fa-pencil-alt ms-text-dark"></i>
                </a>
                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;" id="delete-form">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="javascript:{}" onclick="document.getElementById('delete-form').submit();"> <i class="fas fa-trash-alt ms-text-danger"></i></a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')

@endsection