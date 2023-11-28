<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request, $id)
    {
        $loggedInUserId = Auth::id();
        if ($loggedInUserId != $id) {
            return redirect()->back()->with('error', 'Không thể vào trang này');
        }
        $user = User::where('id', $id)->get();
        return view('frontend.pages.users.user', compact('user'));
    }

    public function edit($id)
    {
        $loggedInUserId = Auth::id();
        if ($loggedInUserId != $id) {
            return redirect()->back()->with('error', 'Không thể vào trang này');
        }
        $user = User::where('id', $id)->get();
        return view('frontend.pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $loggedInUserId = Auth::id();
        if ($loggedInUserId != $id) {
            return redirect()->back()->with('error', 'Không thể vào trang này');
        }
        $user = User::findOrFail($id);
        $imageName = null;
        $imageBannerName = null;

        $data = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'about' => $request->input('about'),
        ];

        if($request->hasFile('avatar') || $request->hasFile('banner')){
            $data = $request->except(['avatar', 'banner']);
        }

        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $imageName = time() . '_'. $image->getClientOriginalName();
            $image->move(public_path('/images/uploads/users/user'), $imageName);
            $data['avatar'] = '/images/uploads/users/user/' . $imageName;
        }
        if($request->hasFile('banner')) {
            $image_banner = $request->file('banner');
            $imageBannerName = time() . '_' . $image_banner->getClientOriginalName();
            $image_banner->move(public_path('/images/uploads/users/banner'), $imageBannerName);
            $data['banner'] = '/images/uploads/users/banner/' . $imageBannerName;
        }

        $user->update($data);
        return redirect()->route('user.show', $id)->with('success', 'Update success');
    }

    public function rePassword(Request $request, $id)
    {
        $loggedInUserId = Auth::id();
        if ($loggedInUserId != $id) {
            return redirect()->back()->with('error', 'Không thể vào trang này');
        }
        $user = User::findOrFail($id);
        if(password_verify($request->password, $user->password)) {
            $pass = [
                'password' => password_hash($request->re_password, PASSWORD_DEFAULT)
            ];
            $user->update($pass);
            return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
        }else {
            return redirect()->back()->with('error', 'Mật khẩu không chính xác');
        }
    }
}
