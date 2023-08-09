<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use App\Models\ProgramCourse;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::with('cprogram')->orderBy('created_at', 'DESC')->paginate();
// dd($courses);
        return view('courses.index', compact('courses'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::latest()->get();

        return view('courses.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        $course = new Course;
        $course->code = $request->code;
        $course->cname = $request->cname;
        // dd($course);
        $course->save();
        $course=Course::findOrFail($request->code);
        // dd($course);
        $program = Program::findOrFail($request->pid);
        // $course->cprogram()->attach($request->pid);
        ProgramCourse::create([
            "c_code"=> $course->code,
            "pid"=> $program->id
        ]);
        DB::commit();
        return redirect()->route('courses')->with('success', 'Course added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $courses = Course::findOrFail($code);

        return view('courses.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $code)
    {
        $courses = Course::findOrFail($code);

        return view('courses.edit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $code)
    {
        $courses = Course::findOrFail($code);

        $courses->update($request->all());

        return redirect()->route('courses')->with('success', 'course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code)
    {
        $courses = Course::findOrFail($code);

        $courses->delete();

        return redirect()->route('courses')->with('success', 'course deleted successfully');
    }
}
