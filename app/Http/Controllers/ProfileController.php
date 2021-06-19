<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //index Page Show

    public function index()
    {
        return view('backend.profile');
    }


    //Profile Update
    public function ProfileUpdate(Request $request , $id)
    {

        $user_id =  User::find($id);
        $user_id -> name =  $request -> name;
        $user_id -> uname =  $request -> uname;
        $user_id -> email =  $request -> email;
        $user_id -> cell =  $request -> cell;
        $user_id -> address =  $request -> address;
        $user_id -> city =  $request -> city;
        $user_id -> state =  $request -> state;
        $user_id -> zipcode =  $request -> zipcode;
        $user_id -> country =  $request -> country;
        $user_id -> update();

    }

    public function ProfileBioUpdate(Request $request , $id)
    {

        $fileuname = ' ';
        if ($request -> hasFile('profile_photo') ) {
            $file_get =   $request->file('profile_photo');
            $fileuname = md5(time().rand()).'.'.$file_get -> getClientOriginalExtension();
            $file_get ->  move(public_path('backend/assets/user/photos') ,$fileuname );
        }



        $bio_update_id  =  User::find($id);
        $bio_update_id -> info = $request -> info;
        $bio_update_id -> photo =  $fileuname  ;
        $bio_update_id -> update();
    }








}
