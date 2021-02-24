<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AdminRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    // Read
    public function index()
    {
        // $admin = User::with('roles')->role('super-admin')->first();
        $admins = User::with('roles')->get();
        return view('backend.admin.admin', compact('admins'));
    }

    // Create
    public function create()
    {
        return view('backend.admin.create');
    }

    // Store
    public function store(AdminRequest $request)
    {
        $data =  $request->validated();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        // Spatie Insert Role
        $user =User::latest()->first();
        $user->assignRole('admin');
        return redirect('admin')->with('status', 'Create data successfully');
    }

    // Edit
    public function edit(User $user)
    {
        return view('backend.admin.edit', compact('user'));
    }

    // Update
    public function update(AdminRequest $request, User $user)
    {
        $data = $request->validated();

        // Change Password
        $oldPassword = request('password');
        $newPassword = request('password_new');
        $currentPassword = auth()->user()->password;
        if (Hash::check($oldPassword, $currentPassword)) {
            $user->update([
                'name'     => $request->name,
                'email'     => $request->email,
                'password' => Hash::make($newPassword)
            ]);
            Auth::logout();
            return redirect('/login')->with('status', 'Re-Login');
        } else return back()->withErrors(['password' => 'Password not match']);
    }

    // Delete
    public function destroy(User $user)
    {
        $user->delete();
    }

}
