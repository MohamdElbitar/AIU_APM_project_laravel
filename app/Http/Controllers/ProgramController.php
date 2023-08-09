<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programs = Program::orderBy('created_at', 'DESC')->get();
        $categories = Category::latest()->get();


        return view('programs.index', compact('programs'),compact('categories'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('programs.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Program::create($request->all());

        return redirect()->route('programs')->with('success', 'Programs added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $programs = Program::findOrFail($id);

        return view('programs.show', compact('programs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $programs = Program::findOrFail($id);

        return view('programs.edit', compact('programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $programs = Program::findOrFail($id);

        $programs->update($request->all());

        return redirect()->route('programs')->with('success', 'program updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programs = Program::findOrFail($id);

        $programs->delete();

        return redirect()->route('programs')->with('success', 'program deleted successfully');
    }
}
