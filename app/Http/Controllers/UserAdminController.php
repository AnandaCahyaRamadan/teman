<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
    
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required:unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|confirmed',
            'is_admin' => 'required'
        ]);
        $array = $request->only([
            'name', 'email', 'password', 'is_admin'
        ]);
        $array['password'] = bcrypt($array['password']);
    
        $user = User::create($array);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) return redirect()->route('users.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|confirmed',
            'is_admin' => 'nullable'

        ]);
    
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();
    
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
    
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
    
        if ($user) $user->delete();
    
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menghapus user');
    
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $users = User::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('admin.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
}
