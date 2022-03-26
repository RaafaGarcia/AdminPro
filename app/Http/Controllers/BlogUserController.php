<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Blog_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class BlogUserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Blog_user::class);
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

        $columns = [
            [
                'id' => 5,
                'name' => "Id",
                'slot' => "id",

            ],
            [
                'id' => 1,
                'name' => "Nombre",
                'slot' => "name",

            ],
            [
                'id' => 2,
                'name' => "Correo Electrónico",
                'slot' => "email",

            ],
            [
                'id' => 3,
                'name' => "Rol",
                'slot' => "role",

            ],
            [
                'id' => 4,
                'name' => "Fecha de creación",
                'slot' => "created_at",

            ],

        ];

        return Inertia::render('BlogUser/Index', [
            'users' => Blog_user::filter($request->only($queries))->paginate(25)->withQueryString(),
            'filters' => $request->all($queries),
            'columns' => $columns,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('BlogUser/Create');
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
            'email' => 'required|max:255|unique:mysql_blog.users',
            'password' => 'required',

        ], $messages);

        $input['password'] = Hash::make($input['password']);
        // dd($input['password']);

        $user = Blog_user::create($input);

        return back()->with('success', 'Usuario creado ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Blog_user $blog_user)
    {
        return Inertia::render('BlogUser/Show', ['manageUser' => $blog_user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog_user $blog_user)
    {

        return Inertia::render('BlogUser/Edit', [
            'manageUser' => $blog_user
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog_user $blog_user)
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
            'email' => 'required|max:255|unique:mysql_blog.users,email,' . $blog_user->id,

        ], $messages);

        // dd($user);
        $blog_user->update($input);

        // if ($input['role_id']) {
        //     $user->role_id = $input['role_id'];

        //     $user->save();
        // }

        return redirect()->route('blog_users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog_user $blog_user)
    {
        $blog_user->delete();

        return back()->with('success', 'Eliminado');
    }
}
