<?php

namespace App\Http\Controllers;

use App\Models\Blog_category;
use App\Models\Blog_post;
use App\Models\Blog_subcategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    /**
     * @context - Referencia a la url de las peticiones para este resource
     * @title - Título del recurso
     * @description -  Descripcion del recurso
     * @columns -  Campos que apareceran en la tabla del index
     * @schema -  Campos del formulario
     * @form -  instancia de inertia.Form
     */
    private $context = "blog_posts";
    private $title = 'Blog Publicaciones';
    private $description = "
    Llene los campos a continuacion";
    private $schema = [
        [
            'id' => 2,
            'cols' => "6",
            'name' => "Blog Categoría",
            'slot' => "category_id",
            'type' => "relation-filter",
            'required' => true,
            'placeholder' => 'Categoría a la que pertenece',
            'relation' => "blog_category",
            'relation_key' => "name",
        ],
        [
            'id' => 2,
            'cols' => "6",
            'name' => "Blog Subcategoría",
            'slot' => "subcategory_id",
            'type' => "relation",
            'required' => true,
            'placeholder' => 'Subcategoría a la que pertenece',
            'relation' => "blog_subcategory",
            'relation_key' => "name",
        ],

        [
            'id' => 2,
            'cols' => "10",
            'name' => "Título",
            'slot' => "title",
            'type' => "text",
            'required' => true,
            'placeholder' => 'Agrege un Título para la publicación',
            'relation' => "",

        ],

        [
            'id' => 2,
            'cols' => "6",
            'name' => "Subtítulo",
            'slot' => "subtitle",
            'type' => "text",
            'required' => false,
            'placeholder' => 'Subtítulo Opcional',
            'relation' => "",

        ],

        [
            'id' => 2,
            'cols' => "6",
            'name' => "Autor",
            'slot' => "creator",
            'type' => "text",
            'required' => true,
            'placeholder' => 'Nombre del autor de la publicación',
            'relation' => "",

        ],
        [
            'id' => 2,
            'cols' => "6",
            'name' => "Publicar el",
            'slot' => "publication_date",
            'type' => "date",
            'required' => true,
            'placeholder' => 'Nombre del autor de la publicación',
            'relation' => "",

        ],
        [
            'id' => 2,
            'cols' => "12",
            'name' => "Contenido",
            'slot' => "content",
            'type' => "editor",
            'required' => true,
            'placeholder' => 'Agrege la información correspondiente',
            'relation' => "",

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
            'name' => "Título",
            'slot' => "title",

        ],
        [
            'id' => 2,
            'name' => "Autor",
            'slot' => "creator",

        ],
        [
            'id' => 3,
            'name' => "Categoria",
            'slot' => "blog_subcategory.blog_category.name",

        ],
        [
            'id' => 3,
            'name' => "Subcategoría",
            'slot' => "blog_subcategory.name",

        ],
        
        [
            'id' => 3,
            'name' => "Fecha de publicación",
            'slot' => "publication_date"

        ],
    ];
    private $formSchema = [
        'title' => '',
        'creator' => '',
        'content' => null,
        'publication_date' => 'today',
        'subcategory_id' => '',
    ];

    public $relations = [
        'blog_category' => [],
        'blog_subcategory' => [],
    ];

    public function __construct()
    {
        $this->authorizeResource(Blog_post::class);

       
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
            'data' => Blog_post::filter($request->only($queries))->paginate(10)->withQueryString(),
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
        $this->relations['blog_category'] = Blog_category::get();
        $queries = ['category_id', 'page'];

        if ($request->category_id) {
            $this->relations['blog_subcategory'] = Blog_subcategory::where('category_id', $request->category_id)->get();
        }

        return Inertia::render('Resource/Create', [
            'context' => $this->context,
            'schema' => $this->schema,
            'formSchema' => $this->formSchema,
            'title' => $this->title,
            'description' => $this->description,
            'filters' => $request->all($queries),
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
            'title.required' => 'Campo Requerido.',
            'creator.required' => 'Campo Requerido.',
            'title.unique' => 'Este nombre ya esta registrado.',
            'content.required' => 'Campo Requerido.',
            'publication_date.required' => 'Campo Requerido.',
            'subcategory_id.required' => 'Campo Requerido.',

        ];
        $request->validate([
            'title' => 'required|string|unique:mysql_blog.blog_posts',
            'creator' => 'required',
            'content' => 'required',
            'publication_date' => 'required',
            'subcategory_id' => 'required',

        ], $messages);

        $input['visits'] = 0;
        $input['user_id'] = $request->user()->id;

        $model = Blog_post::create($input);

        return redirect()->route('blog_posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Blog_post $model)
    {
        // return Inertia::render('User/Show', ['manageUser' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Blog_post $blog_post)
    {
        $this->relations['blog_category'] = Blog_category::get();
        $queries = ['category_id', 'page'];

        if ($request->category_id) {
            $this->relations['blog_subcategory'] = Blog_subcategory::where('category_id', $request->category_id)->get();
        }else{
            $request['category_id'] = $blog_post->blog_subcategory->category_id;
            $this->relations['blog_subcategory'] = Blog_subcategory::where('category_id', $request->category_id)->get();
        }

        return Inertia::render('Resource/Edit', [
            'element' => $blog_post,
            'context' => $this->context,
            'schema' => $this->schema,
            'formSchema' => $this->formSchema,
            'title' => $this->title,
            'description' => $this->description,
            'filters' => $request->all($queries),
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
    public function update(Request $request, Blog_post $blog_post)
    {
        $input = $request->all();
        $messages = [
            'title.required' => 'Campo Requerido.',
            'creator.required' => 'Campo Requerido.',
            'title.unique' => 'Este nombre ya esta registrado.',
            'content.required' => 'Campo Requerido.',
            'publication_date.required' => 'Campo Requerido.',
            'subcategory_id.required' => 'Campo Requerido.',

        ];
        $request->validate([
            'title' => 'required|string|unique:mysql_blog.blog_posts,title,' .$blog_post->id,
            'creator' => 'required',
            'content' => 'required',
            'publication_date' => 'required',
            'subcategory_id' => 'required',

        ], $messages);


        // dd($user);
        $blog_post->update($input);

        // if ($input['role_id']) {
        //     $user->role_id = $input['role_id'];

        //     $user->save();
        // }

        return redirect()->route('blog_posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog_post $blog_post)
    {
        $blog_post->delete();

        return back()->with('success', 'Eliminado');
    }
}
