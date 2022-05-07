<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queries = ['search', 'page'];

       

        $users = User::filter($request->only($queries))->paginate(2)->withQueryString();
        return $this->sendResponse( $users,'Usuarios consultados');

        // return Inertia::render('User/Index', [
        //     'users' => User::filter($request->only($queries))->paginate(25)->withQueryString(),
        //     'filters' => $request->all($queries),
        //     'columns' => $columns,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('User/Create', [
            'roles' => Role::where("name", "!=", "devs")->where("name", "!=", "admin")->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $messages = [
            'name.required' => 'Campo Requerido.',
            'email.required' => 'Campo Requerido.',
            'email.unique' => 'Este correo ya esta registrado.',
            'password.required' => 'Campo Requerido.',

        ];
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|max:255|unique:users',
            'password' => 'required',

        ], $messages);

        $input['password'] = Hash::make($input['password']);
        // dd($input['password']);

        $user = User::create($input);

        $data = [
            'type' => 'users',
            'subtype' => 'create',
            'body' => 'Ha creado un usuario en la plataforma.',
            'link' => '/users',
            'item_id' => $user->id,
            'user_id' => $request->user()->id,
            'action_id' => now()->getPreciseTimestamp(3),
        ];

        NotificationController::add($request->user(), $data);
        return back()->with('success', 'Usuario creado ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Inertia::render('User/Show', ['manageUser' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return Inertia::render('User/Edit', [
            'manageUser' => $user,
            'roles' => Role::where("name", "!=", "devs")->where("name", "!=", "admin")->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $authUser = $request->user();
        $input = $request->all();

        $messages = [
            'name.required' => 'Campo Requerido.',
            'email.required' => 'Campo Requerido.',
            'email.unique' => 'Este correo ya esta registrado.',

        ];
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|max:255|unique:users,email,' . $user->id,

        ], $messages);

        // dd($user);
        $user->update($input);

        // if ($input['role_id']) {
        //     $user->role_id = $input['role_id'];

        //     $user->save();
        // }
        $data = [
            'type' => 'users',
            'subtype' => 'update',
            'body' => 'Ha modificado el usuario ' . $user->name,
            'link' => '/users/' . $user->id . '/edit',
            'item_id' => $user->id,
            'user_id' => $request->user()->id,
            'action_id' => now()->getPreciseTimestamp(3),
        ];

        NotificationController::add($request->user(), $data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $data = [
            'type' => 'users',
            'subtype' => 'delete',
            'body' => 'Elimino el usuario ' . $user->name . ', ' . $user->email,
            'link' => '/users',
            'item_id' => $user->id,
            'user_id' => Auth::user()->id,
            'action_id' => now()->getPreciseTimestamp(3),
        ];

        $user->delete();
        NotificationController::add(Auth::user(), $data);

        return back()->with('success', 'Eliminado');
    }
}
