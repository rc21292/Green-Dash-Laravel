@extends('layouts.master')
@section('head')
  <link href="{{asset('assets/css/sweetalert2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
  <div class="col-md-8">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-arrow-sep">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="material-icons">home</i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.my-profile.index')}}">{{ trans('cruds.profile.title_singular') }}</a></li>
      </ol>
    </nav>
  </div>
  <div class="col-xl-8 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header bg-info">
        <div class=" d-flex justify-content-between">
          <div class="ms-header-text">
            <h6>{{ trans('cruds.profile.title_singular') }}</h6>
          </div>
          <button type="submit" class="btn btn-outline-dark ms-graph-metrics" name="button" form="profile-form">{{ trans('global.update') }}</button>
        </div>
      </div>
      <div class="ms-panel-body">
        <form action="{{ route("admin.my-profile.update", Auth::User()->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation clearfix" novalidate="" id="profile-form">
          @csrf
          @method('PUT')
          <div class="form-row">
            <div class="col-md-12">
              <label for="name">{{ trans('cruds.profile.fields.name') }}*</label>
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
            <label for="email">{{ trans('cruds.profile.fields.email') }}*</label>
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
          <label for="profile_picture">{{ trans('cruds.profile.fields.profile_picture') }}</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="avatar" id="avatar" onchange="loadPreview(this);">
              <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <img id="preview_img"  @if(isset($user->avatar)) src="{{URL::asset('/uploads/profile-pictures').'/'.$user->avatar}}" @else src="{{asset('assets/images/sample-user.png')}}" @endif class="mt-2" width="120" height="120" style="border: 1px solid #bcc4ce; border-radius: 5px" />
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
@endsection
@push('scripts')
<script>
  function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(id)
        .attr('src', e.target.result)
        .width(120)
        .height(120);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@if( Session::has( 'success' ))
<script src="{{asset('assets/js/sweetalert2.min.js')}}"> </script>
<script type="text/javascript">

$( document ).ready(function() {

        Swal.fire({
          position: 'top-end',
          type: 'success',
          title: '{{ Session::get( 'success' ) }}',
          showConfirmButton: false,
          timer: 2200
        });
  });
</script>
@endif
@endpush