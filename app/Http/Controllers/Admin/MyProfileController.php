<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\User;
use Auth;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        return view('auth.myprofile',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email, '. Auth()->user()->id . ',id'
        ]);

        if($request->has('avatar')){
            $originalImage= $request->file('avatar');
            $image = Image::make($originalImage);
            $path = public_path().'/uploads/profile-pictures/';
            if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
          }
          $image->resize(120,120);
          $image->save($path.time().$originalImage->getClientOriginalName()); 
          $filename= time().$originalImage->getClientOriginalName();
      }

      $user = User::find($id);
      $user->name  = $request->name;
      $user->email = $request->email;
      if($request->has('avatar')){
        File::delete(public_path('uploads/profile-pictures/'.$user->avatar));
        $user->avatar = $filename;
    }
    $user->save();

    return redirect()->route('admin.my-profile.index')->withSuccess('Profile Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
