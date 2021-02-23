<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AdminRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        dd($user);
        return view('backend.admin.create');
    }

}
