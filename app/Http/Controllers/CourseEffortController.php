<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEffort;
use Illuminate\Http\Request;

class CourseEffortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cefforts = CourseEffort::orderBy('created_at', 'DESC')->get();
        $courses = Course::latest()->get();


        return view('cefforts.index', compact('cefforts'),compact('courses'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::latest()->get();

        return view('cefforts.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CourseEffort::create($request->all());

        return redirect()->route('cefforts')->with('success', 'Course Effort added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cefforts = CourseEffort::findOrFail($id);

        return view('cefforts.show', compact('cefforts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cefforts = CourseEffort::findOrFail($id);

        return view('cefforts.edit', compact('cefforts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cefforts = CourseEffort::findOrFail($id);

        $cefforts->update($request->all());

        return redirect()->route('cefforts')->with('success', 'Course Effort updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cefforts = CourseEffort::findOrFail($id);

        $cefforts->delete();

        return redirect()->route('cefforts')->with('success', 'Course Effort deleted successfully');
    }
}
