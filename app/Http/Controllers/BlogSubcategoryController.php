<?php

namespace App\Http\Controllers;

use App\Models\Blog_category;
use App\Models\Blog_subcategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogSubcategoryController extends Controller
{
/**
 * @context - Referencia a la url de las peticiones para este resource
 * @title - Título del recurso
 * @description -  Descripcion del recurso
 * @columns -  Campos que apareceran en la tabla del index
 * @schema -  Campos del formulario
 * @form -  instancia de inertia.Form
 */
    private $context = "blog_subcategories";
    private $title = 'Blog Subcategorias';
    private $description = "
    Estas categorias son usadas como etiquetas para las publicaciones y sea mas facil buscarlas";
    private $schema = [
        [
            'id' => 1,
            'cols' => "6",
            'name' => "Nombre",
            'slot' => "name",
            'type' => "text",
            'required' => true,
            'placeholder' => 'Nombre de categoría',
            'relation' => "",

        ],
        [
            'id' => 2,
            'cols' => "8",
            'name' => "Descripción",
            'slot' => "description",
            'type' => "textarea",
            'required' => true,
            'placeholder' => 'Descripción de categoría',
            'relation' => "",
        ],
        [
            'id' => 3,
            'cols' => "6",
            'name' => "Categoría",
            'slot' => "category_id",
            'type' => "relation",
            'required' => true,
            'placeholder' => 'Categoría a la que pertenece',
            'relation' => "blog_category",
            'relation_key' => "name"
        ],
    ];
    private $columns = [
        [
            'id' => 1,
            'name' => "Id",
            'slot' => "id",

        ],
        [
            'id' => 2,
            'name' => "Nombre",
            'slot' => "name",

        ],
        [
            'id' => 3,
            'name' => "Categoría",
            'slot' => "blog_category.name",

        ],
    ];
    private $formSchema = [
        'name' => '',
        'description' => '',
        'category_id' => '',
    ];

    public $relations = [
        'blog_category' => '',
    ];

    public function __construct()
    {
        $this->authorizeResource(Blog_subcategory::class);
       
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
            'data' => Blog_subcategory::filter($request->only($queries))->paginate(10)->withQueryString(),
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
    public function create()
    {
        $this->relations = [
            'blog_category' => Blog_category::get(),
        ];
        return Inertia::render('Resource/Create', [
            'context' => $this->context,
            'schema' => $this->schema,
            'formSchema' => $this->formSchema,
            'title' => $this->title,
            'description' => $this->description,
            'relations' => $this->relations,
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
            'category_id.required' => 'Campo Requerido.',
        ];
        $request->validate([
            'name' => 'required|string|unique:mysql_blog.blog_subcategories',
            'description' => 'required|max:255',
            'category_id'=> 'required'

        ], $messages);

        $model = Blog_subcategory::create($input);

        return back()->with('success', 'Completado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Blog_subcategory $model)
    {
        // return Inertia::render('User/Show', ['manageUser' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog_subcategory $blog_subcategory)
    {
        $this->relations = [
            'blog_category' => Blog_category::get(),
        ];

        return Inertia::render('Resource/Edit', [
            'element' => $blog_subcategory,
            'schema' => $this->schema,
            'formSchema' => $this->formSchema,
            'title' => $this->title,
            'description' => $this->description,
            'context' => $this->context,
            'relations' => $this->relations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog_subcategory $blog_subcategory)
    {
        $input = $request->all();
        $messages = [
            'name.required' => 'Campo Requerido.',
            'description.required' => 'Campo Requerido.',
            'name.unique' => 'Este nombre ya esta registrado.',
            'category_id.required' => 'Campo Requerido.',

        ];
        $request->validate([
            'name' => 'required|string|unique:mysql_blog.blog_categories,name,' . $blog_subcategory->id,
            'description' => 'required|max:255',
            'category_id'=> 'required'

        ], $messages);

        // dd($user);
        $blog_subcategory->update($input);

        // if ($input['role_id']) {
        //     $user->role_id = $input['role_id'];

        //     $user->save();
        // }

        return back()->with('success', 'Completado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog_subcategory $blog_subcategory)
    {
        $blog_subcategory->delete();

        return back()->with('success', 'Eliminado');
    }

}
