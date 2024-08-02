<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    public function showEditForm()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $data = $request->only('fullname', 'username', 'email');

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        DB::table('users')->where('id', $user->id)->update($data);

        return redirect()->route('dashboard')->with('success', 'Cập nhật thành công');
    }

    public function showChangePasswordForm()
    {
        return view('user.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors('Current password is incorrect');
        }

        $user->password = Hash::make($request->new_password);

        DB::table('users')->where('id', $user->id)->update(['password' => $user->password]);

        return redirect()->route('dashboard')->with('success', 'Đổi mật khẩu thành công');
    }

    public function adminIndex()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function toggleUserActivation(User $user)
    {
        $user->active = !$user->active;
        DB::table('users')->where('id', $user->id)->update(['active' => $user->active]);

        return redirect()->route('admin.users')->with('success', 'Cập nhật trạng thái thành công');
    }
}
