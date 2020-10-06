<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $option = $this->preparedData();
        $user = new User;

        return view('admin.user.create', compact('option', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:16|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password-confirm' => 'required|string|min:8|same:password',
            'role_id' => 'required|int',
            'is_active' => 'required'
        ])->validate();

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->is_active = $request->is_active;
        $user->save();

        flash('New User Added!')->success();
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $option = $this->preparedData();

        return view('admin.user.edit', compact('option', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:16',
            'email' => 'required|string|email|max:255',
            'role_id' => 'required|int',
            'is_active' => 'required'
        ])->validate();

        // dd($request->all());

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->is_active = $request->is_active;
        $user->update();

        flash('User Edited!')->warning();
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('User Has Been Deleted!')->error();
        return redirect('/admin/users');
    }

    private function preparedData()
    {
        $roles = Role::select('id', 'name')->get();

        $role = [];

        foreach ($roles as $r) {
            $role[$r->id] = $r->name;
        }

        return [
            'role' => $role
        ];
    }

    public function dataTables()
    {
        $model = User::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('roles', function (User $user) {
                return $user->role->name;
            })
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'delete_url' => route('users.destroy', $model->id),
                    'edit_url' => route('users.edit', $model->id),
                    'show_url' => route('users.show', $model->id),
                    'showOnly' => true,
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
