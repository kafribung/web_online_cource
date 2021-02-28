<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminRequest;

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

    // 
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
        //
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
        //
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
