<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|min:3|max:255',]
        );

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'A címke sikeresen létrehozva.');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }
}
