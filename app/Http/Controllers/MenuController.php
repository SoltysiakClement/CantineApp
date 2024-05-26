<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMenuNotification;
use Illuminate\Support\Facades\Notification;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::paginate(12);
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
        }
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/menus', 'public');

        $menu =  Menu::create([
            'nom' => $request->nom,
            'category' => $request->category,
            'description' => $request->description,
            'prix' => $request->prix,
            'image_path' => $imagePath,
        ]);

         // Envoyer la notification aux utilisateurs enregistrés
         $users = User::all();
         foreach ($users as $user) {
             $user->notify(new NewMenuNotification($menu));
         }
 
        return redirect()->route('admin.menus.create')->with('success', 'Menu créé avec succès.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $path = $request->file('image')->store('images/menus', 'public');
        $menu->update(['image_path' => $path]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
