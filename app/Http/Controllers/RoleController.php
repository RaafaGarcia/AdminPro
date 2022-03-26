<?php

namespace App\Http\Controllers;

use App\Models\Permition;
use App\Models\Role;
use App\Models\Role_permition;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
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

        return Inertia::render('Role/Index', [
            'roles' => Role::where('name', '!=', 'admin')->filter($request->only($queries))->paginate(10)->withQueryString(),
            'filters' => $request->all($queries),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('Role/Create', [
            // 'roles' => Role::get(),
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
            'description.required' => 'Campo Requerido.',
            'name.unique' => 'Este nombre ya esta registrado.',

        ];
        $request->validate([
            'name' => 'required|string|unique:roles',
            'description' => 'required|max:255',

        ], $messages);

        $roles = Role::create($input);

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // return Inertia::render('User/Show', ['manageUser' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // $permisos = Permition::join('role_permitions', 'role_permitions.permition_id', '=', 'permitions.id')
        // ->where('permitions.id' ,'!=','role_permitions.pertmition.id')
        // ->select('role_permitions.*');

        $permitions = Permition::where('name', '!=', 'resources')->get();

        if (count($permitions) > 0) {
            foreach ($permitions as $key => $permition) {
                $role_permition = Role_permition::where('role_id', $role->id)->where('permition_id', $permition->id)->first();
                if (empty($role_permition)) {
                    Role_permition::create([

                        "role_id" => $role->id,
                        "permition_id" => $permition->id,
                        "create" => 0,
                        "read" => 0,
                        "update" => 0,
                        "delete" => 0,
                        "specials" => null,
                    ]);
                }
            }
        } else {
            return redirect()->route('dashboard');
        }

        $rol_permisos = Role_permition::where('role_id', $role->id)->get();

        return Inertia::render('Role/Edit', [
            'roles' => $role,
            'permitions' => $rol_permisos,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $authUser = $request->user();
        $input = $request->all();

        $messages = [
            'name.required' => 'Campo Requerido.',
            'description.required' => 'Campo Requerido.',
            'name.unique' => 'Este nombre ya esta registrado.',

        ];
        $request->validate([
            'name' => 'required|string|unique:roles',
            'description' => 'required|max:255|',

        ], $messages);

        // dd($user);
        $role->update($input);

        // if ($input['role_id']) {
        //     $user->role_id = $input['role_id'];

        //     $user->save();
        // }

        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('success', 'Eliminado');
    }

    public function saveRoles(Request $request, Role_permition $role_permition)
    {
        $input = $request->all();

       

        $messages = [
            'role_id.required' => 'Campo Requerido.',
            'permition_id.required' => 'Campo Requerido.',
            'create.required' => 'Campo Requerido.',
            'read.required' => 'Campo Requerido.',
            'update.required' => 'Campo Requerido.',
            'delete.required' => 'Campo Requerido.',
        ];
        $request->validate([
            'role_id' => 'required',
            'permition_id' => 'required',
            'create' => 'required|integer',
            'read' => 'required|integer',
            'update' => 'required|integer',
            'delete' => 'required|integer',
        ], $messages);

        // dd($user);
        $role_permition->update($input);

        return back()->with('success');
    }
}
