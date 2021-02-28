<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    // READ
    public function index()
    {
        $users = User::doesntHave('roles')->orderBy('id', 'desc')->get();
        return view('backend.user.user', compact('users'));
    }

    // CREATE    
    public function create()
    {
        return view('backend.user.create');
    }

    // STORE
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect('user')->with('status', 'Create data successfully');
    }

    //  SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    // 
    public function update(AdminRequest $request, User $user)
    {
        $data = $request->validated();
        $oldPassword     = $request->password;
        $newPassword     = $request->password_new;
        $currentPassword = Auth::user()->password;
        if (Hash::check($oldPassword, $currentPassword)) {
            $data['password'] = bcrypt($newPassword);
            Auth::logout();
            return redirect('login')->with('status', 'Re-login');
        } else return back()->withErrors(['password' => 'password dont match']);
    }

    //
    public function destroy(User $user)
    {
        $user->delete();
    }
}
