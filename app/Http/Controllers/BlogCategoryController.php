<?php

namespace App\Http\Controllers;

use App\Models\Blog_category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogCategoryController extends Controller
{
    /**
     * @context - Referencia a la url de las peticiones para este resource
     * @title - Título del recurso
     * @description -  Descripcion del recurso
     * @columns -  Campos que apareceran en la tabla del index
     * @schema -  Campos del formulario
     * @form -  instancia de inertia.Form
     */
    private $context = "blog_categories";
    private $title = 'Blog Categorias';
    private $description = "
    Estas categorias son usadas como etiquetas para las publicaciones y sea mas facil buscarlas";
    private $schema = [
        [
            'id' => 5,
            'cols' => "6",
            'name' => "Nombre",
            'slot' => "name",
            'type' => "text",
            'required' => true,
            'placeholder' => 'Nombre de categoría',
            'relation' => "",

        ],
        [
            'id' => 1,
            'cols' => "8",
            'name' => "Descripción",
            'slot' => "description",
            'type' => "textarea",
            'required' => true,
            'placeholder' => 'Descripción de categoría',
            'relation' => "",
        ],
    ];
    private $columns = [
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
    ];
    private $formSchema = [
        'name' => '',
        'description' => '',
    ];

    public function __construct()
    {
        $this->authorizeResource(Blog_category::class);
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

        return Inertia::render('Resource/Index', [
            'data' => Blog_category::filter($request->only($queries))->paginate(10)->withQueryString(),
            'filters' => $request->all($queries),
            'context' => $this->context,
            'columns' => $this->columns,
            'title' => $this->title,
            'description' => $this->description,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $queries = ['search'];

        return Inertia::render('Resource/Create', [
            'context' => $this->context,
            'schema' => $this->schema,
            'formSchema' => $this->formSchema,
            'title' => $this->title,
            'description' => $this->description,
            'filters' => $request->all($queries),
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
            'name' => 'required|string|unique:mysql_blog.blog_categories',
            'description' => 'required|max:255',

        ], $messages);

        $model = Blog_category::create($input);

        return redirect()->back()->with('success', 'Completado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Blog_category $model)
    {
        // return Inertia::render('User/Show', ['manageUser' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog_category $blog_category)
    {

        return Inertia::render('Resource/Edit', [
            'element' => $blog_category,
            'context' => "blog_categories",
            'schema' => $this->schema,
            'formSchema' => $this->formSchema,
            'title' => 'Blog Categorias',
            'description' => 'Estas categorias son usadas como etiquetas para las publicaciones y sea mas facil buscarlas',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog_category $blog_category)
    {
        $input = $request->all();
        $messages = [
            'name.required' => 'Campo Requerido.',
            'description.required' => 'Campo Requerido.',
            'name.unique' => 'Este nombre ya esta registrado.',

        ];
        $request->validate([
            'name' => 'required|string|unique:mysql_blog.blog_categories,name,' . $blog_category->id,
            'description' => 'required|max:255',

        ], $messages);

        // dd($user);
        $blog_category->update($input);

        // if ($input['role_id']) {
        //     $user->role_id = $input['role_id'];

        //     $user->save();
        // }

        return redirect()->back()->with('success', 'Completado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog_category $blog_category)
    {
        // dd($blog_category);
        $blog_category->delete();

        return redirect()->back()->with('success', 'Eliminado');
    }

}
