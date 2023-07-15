<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Models\Category;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role','=',1)->paginate(10);
        $categories = Category::all();
        return view('users.index', compact('users', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('users.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStore $request)
    {
        $request->validated();
        $user = User::create($request->all());
        $categories = $request->input('categories');
        $user->categories()->attach($categories);
        event(new Registered($user));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $categories = Category::all();
        return view('users.edit', compact('user','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdate $request,User $user)
    {
        $request->validated();
        $user->update($request->all());
        $categories = $request->input('categories');
        $user->categories()->sync($categories);
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    /**
     * Search the specified resource from storage.
     */

    public function search(Request $request)
    {
        $users = User::where('name','like', '%'.$request->input('search').'%')->get();
        return view('users.index', compact("users") );
    }
}
