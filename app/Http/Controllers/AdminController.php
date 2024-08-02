<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function toggleActive($id)
    {
        $user = User::find($id);
        $user->active = !$user->active;

        DB::table('users')->where('id', $user->id)->update(['active' => $user->active]);

        return redirect()->route('admin.users');
    }
}
