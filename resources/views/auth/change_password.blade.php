@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-8">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-arrow-sep">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('global.change_password') }}</li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-8 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header bg-info">
        <div class=" d-flex justify-content-between">
          <div class="ms-header-text">
            <h6>{{ trans('global.change_password') }}</h6>
          </div>
          <button type="submit" class="btn btn-outline-dark ms-graph-metrics" name="button" form="password-form">{{ trans('global.change_password') }}</button>
        </div>
      </div>
      <div class="ms-panel-body">
        <form action="{{ route('auth.change_password') }}" method="POST" enctype="multipart/form-data" class="needs-validation clearfix" novalidate="" id="password-form">
          @csrf
          @method('PATCH')
          <div class="form-row">
            <div class="col-md-12">
              <label for="current_password">Current password *</label>
              <div class="input-group">                
                <input type="password" id="current_password" name="current_password" class="form-control" required>
                @if($errors->has('current_password'))
                <div class="invalid-feedback">
                  {{ $errors->first('current_password') }}
                </div>
                @endif
              </div>
            </div>

            <div class="col-md-12">
              <label for="new_password">New password *</label>
              <div class="input-group">                                
                <input type="password" id="new_password" name="new_password" class="form-control" required>
                @if($errors->has('new_password'))
                <div class="invalid-feedback">
                  {{ $errors->first('new_password') }}
                </div>
                @endif
              </div>
            </div>

            <div class="col-md-12">
              <label for="new_password_confirmation">New password confirmation *</label>
              <div class="input-group">                
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                @if($errors->has('new_password_confirmation'))
                <div class="invalid-feedback">
                  {{ $errors->first('new_password_confirmation') }}
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