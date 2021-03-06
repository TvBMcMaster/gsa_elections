<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\User;
use App\Organization;
use App\Role;

class UsersControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('organization')->get();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::all();
        $roles = Role::orderBy('name', 'desc')->get();
        return view('admin.users.create', compact('organizations', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        if (!$request->organization == -1) {
            $user->organization->associate($request->organization);
        }
        $user->role->associate($request->role);
        $user->save();

        return redirect('/admin/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $organizations = Organization::all();
        $roles = Role::all();
        return view('admin.users.edit', compact(['user', 'organizations', 'roles']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('organization')->findOrFail($id);
        return view('admin.users.show')->with('user', $user);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->organization > 0) {  
            $user->organization_id = $request->organization;
        }
        if ($request->role > 0) {  
            $user->role->associate($request->role);
        }
        $user->save();
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('users.index'));
    }
}
