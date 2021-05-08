@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">User Management</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</h6>
      </div>
      <div class="ms-panel-body">
        <div class="table-responsive">
          <table class="table thead-primary">
            <thead>
              <tr>
                <th scope="col">{{ trans('cruds.user.fields.id') }}</th>
                <th scope="col">{{ trans('cruds.user.fields.name') }}</th>
                <th scope="col">{{ trans('cruds.user.fields.email') }}</th>
                <th scope="col">{{ trans('cruds.user.fields.roles') }}</th>
                <th scope="col">{{ trans('global.action') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $key => $user)
              <tr data-entry-id="{{ $user->id }}">
                <td>
                  {{ $user->id ?? '' }}
                </td>
                <td>
                  {{ $user->name ?? '' }}
                </td>
                <td>
                  {{ $user->email ?? '' }}
                </td>
                <td>
                  @foreach($user->roles()->pluck('name') as $role)
                  <span class="badge badge-info">{{ $role }}</span>
                  @endforeach
                </td>
                <td>
                  <a href="{{ route('admin.users.show', $user->id) }}">
                    <i class="far fa-eye-alt ms-text-warning"></i>
                  </a>
                  <a href="{{ route('admin.users.edit', $user->id) }}">
                    <i class="fas fa-pencil-alt ms-text-primary"></i>
                  </a>
                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;" id="delete-form">
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