<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
  

    public function __construct()
    {
        $this->authorizeResource(Subscription::class);
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

        return Inertia::render('Dashboard', [
            'subscriptions' => Subscription::filter($request->only($queries))->paginate(10)->withQueryString(),
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
        return Inertia::render('Subscription/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Campo Requerido.',
            'email.required' => 'Campo Requerido.',
            'email.unique' => 'Este correo ya esta registrado.',
            'phone.required' => 'Campo Requerido.',
            'city.required' => 'Campo Requerido.',
            'content.required' => 'Campo Requerido.',
            
        ];
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|max:255|unique:subscriptions',
            'phone' => 'required',
            'city' => 'required',
            'content' => 'required',
           

        ], $messages);

        $sub = Subscription::create($request->only('name', 'email', 'phone', 'city', 'content'));

        return back()->with('success', 'Subscripción completa');

        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        return Inertia::render('Subscription/Show', ['manageUser' => $subscription]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $user)
    {
        return Inertia::render('Subscription/Edit', ['manageUser' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $authUser = $request->user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string',
        ]);

        $subscription->update($request->only('name', 'email'));

        if ($authUser->hasRole('admin')) {
            $subscription->role = $request->role;
            $subscription->save();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return back()->with('success', 'Eliminado');
    }
    public function suscribirme(Request $request)
    {
        $messages = [
            'name.required' => 'Campo Requerido.',
            'email.required' => 'Campo Requerido.',
            'email.unique' => 'Este correo ya esta registrado.',
            'phone.required' => 'Campo Requerido.',
            'city.required' => 'Campo Requerido.',
            'content.required' => 'Campo Requerido.',
            
        ];
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|max:255|unique:subscriptions',
            'phone' => 'required',
            'city' => 'required',
            'content' => 'required',
           

        ], $messages);

        $sub = Subscription::create($request->only('name', 'email', 'phone', 'city', 'content'));
        // sleep(10);
        return redirect()->back()->with('success', 'Subscripción completa');
        
    }
}


