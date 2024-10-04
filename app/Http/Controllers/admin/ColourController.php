<?php

namespace App\Http\Controllers\admin;

use App\Models\Colour;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ColourController extends Controller
{
    public function index()
    {
        $colours = Colour::all();
        return view('admin.colours.index', compact('colours'));
    }

    public function create()
    {
        return view('admin.colours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Colour::create($request->all());
        return redirect()->route('colours.index')->with('success', 'Colour created successfully.');
    }

    public function edit(Colour $colour)
    {
        return view('admin.colours.edit', compact('colour'));
    }

    public function update(Request $request, Colour $colour)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $colour->update($request->all());
        return redirect()->route('colours.index')->with('success', 'Colour updated successfully.');
    }

    public function destroy(Colour $colour)
    {
        $colour->delete();
        return redirect()->route('colours.index')->with('success', 'Colour deleted successfully.');
    }
}
