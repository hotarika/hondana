<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showEditProfileForm()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();

        return view('auth.edit', compact('user'));
    }

    // public function editProfile(EditProfileRequest $request)
    public function editProfile(EditProfileRequest $request)
    {
        //パスワード変更処理
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('bookshelf')->with('flash', '会員情報を変更しました');
    }
}
