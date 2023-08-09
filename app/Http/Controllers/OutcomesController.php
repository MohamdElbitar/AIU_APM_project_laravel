<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Outcome;
use Illuminate\Http\Request;

class OutcomesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $outcome = Outcome::orderBy('created_at', 'DESC')->get();
        $categories = Category::latest()->get();

        return view('outcome.index', compact('outcome'),compact('categories'));

    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('outcome.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Outcome::create($request->all());

        return redirect()->route('outcomes')->with('success', 'Outcome added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $outcome = Outcome::findOrFail($id);

        return view('outcome.show', compact('outcome'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $outcome = Outcome::findOrFail($id);

        return view('outcome.edit', compact('outcome'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outcome = Outcome::findOrFail($id);

        $outcome->update($request->all());

        return redirect()->route('outcomes')->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outcome = Outcome::findOrFail($id);

        $outcome->delete();

        return redirect()->route('outcomes')->with('success', 'product deleted successfully');
    }
}
