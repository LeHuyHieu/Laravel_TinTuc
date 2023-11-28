<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('backend.pages.index');
    }
    public function profile($id){
        $user = User::where('id', $id)->get();
        return view('backend.pages.profile', compact('user'));
    }
    public function profile_update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->back();
    }
    public function profile_update_avatar(Request $request, $id) {
        $user = User::findOrFail($id);
        $data = [];
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $imageName = time() . '_'. $image->getClientOriginalName();
            $image->move(public_path('/images/uploads/users/user'), $imageName);
            $data['avatar'] = '/images/uploads/users/user/' . $imageName;
        }
        $user->update($data);
        return redirect()->back();
    }
    public function icon_material(){
        return view('backend.pages.icon_material');
    }
    public function pages_error(){
        return view('backend.pages.pages_error');
    }
}