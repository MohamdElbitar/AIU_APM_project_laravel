<?php

namespace App\Http\Controllers;

use App\Exports\AssessmentExport;
use App\Models\Course;
use App\Models\CourseEffort;
use App\Models\Outcome;
use App\Models\OutcomeEffort;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Excel;

use Maatwebsite\Excel\Facades\Excel;


class OutcomeEffortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {



        //
        $cassessments = OutcomeEffort::orderBy('created_at', 'DESC')->paginate(6);
        $programs = Program::latest()->get();
        $courses = Course::latest()->get();
        $outcomes = Outcome::with('oeffort')->latest()->get();
        $cefforts = CourseEffort::with('coutcome')->latest()->get();


///


$semester = $request->input('semester');
$year = $request->input('year');
$c_code = $request->input('c_code');


// Create a query builder for the OutcomeEffort model
$query = OutcomeEffort::orderBy('created_at', 'DESC');


// Apply filters if they are provided
if ($semester) {
    $query->where('semester', $semester);
}
if ($year) {
    $query->where('year', $year);
}
if ($c_code) {
    $query->where('c_code', $c_code);
}

///



// dd($c_code);


        return view('cassessment.index', compact('cassessments'), compact('programs'), compact('courses'), compact('cefforts'), compact('outcomes'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::latest()->get();
        $courses = Course::latest()->get();
        $outcomes = Outcome::with('oeffort')->get();
        $cefforing = CourseEffort::select('id', 'semester', 'year','c_code')->get();;
        // dd($cefforing);


        return view('cassessment.create', compact('programs','courses','cefforing','outcomes') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

//         $abetCodes = $_POST['abet_code']; // This will be an array containing all the selected abet_codes
// $avgNums = $_POST['avg_num'];
// dump($avgNums);
// dd($abetCodes);
        DB::beginTransaction();

        $cefforing = CourseEffort::where([
            ['semester',$request->semester],
            ['year',$request->year],
            ['c_code',$request->c_code]
        ])->select('id', 'semester', 'year','c_code')->first();
        //dd($cefforing,$request->all());
        // $outcomes = Outcome::select('id')->first();
        $outcomes = Outcome::with('oeffort')->where('abet_code',$request->abet_code)->first();
        $programs=Program::findOrFail($request->pid);
        // OutcomeEffort::create($request->all());
        // OutcomeEffort::create([
        //     "oid"=> $outcomes->id,
        //     "ce_code"=> $cefforing->id,
        //     'pname'=>$programs->pname,
        //     'semester'=>$cefforing->semester,
        //     'year'=>$cefforing->year,
        //     'c_code'=>$cefforing->c_code,
        //     'abet_code'=>$outcomes->abet_code,
        //     'p_num'=>$request->p_num,
        //     'avg_num'=>$request->avg_num

        // ]);

        $abetCodes = $request->input('abet_code');
    $avgNums = $request->input('avg_num');
        $count = count($abetCodes);

        for ($i = 0; $i < $count; $i++) {
            OutcomeEffort::create([
                "oid"=> $outcomes->id,
                "ce_code"=> $cefforing->id,
                'pname'=>$programs->pname,
                'semester'=>$cefforing->semester,
                'year'=>$cefforing->year,
                'c_code'=>$cefforing->c_code,
                'abet_code' => $abetCodes[$i],
                'p_num' => $avgNums[$i],
                'avg_num' => $avgNums[$i],
            ]);
        }
        DB::commit();

        return redirect()->route('cassessments')->with('success', 'Course Assesment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);

        $cassessments = OutcomeEffort::findOrFail($id);

        return view('cassessment.show', compact('cassessments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cassessments = OutcomeEffort::findOrFail($id);

        return view('cassessment.edit', compact('cassessments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cassessments = OutcomeEffort::findOrFail($id);

        $cassessments->update($request->all());

        return redirect()->route('cassessments')->with('success', 'program updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cassessments = OutcomeEffort::findOrFail($id);

        $cassessments->delete();

        return redirect()->route('cassessments')->with('success', 'program deleted successfully');
    }


    public function showcourses($id)
    {

        // dd("hello");

        // $courseslist = Course::with('cprogram')->where('id','=',$id)->get();
        $courseslist = Course::whereHas('cprogram',function($q) use($id){
        $q->where('program_courses.pid','=',$id);
        })->get()->toArray();
        $outcomes = Outcome::whereHas('category')->get();
// dd('outcomes');

        $coursesData['data']=$courseslist;
// dd($coursesData);

        echo json_encode($coursesData);
        exit;

    }


    public function showyears($id)
    {


        $yearlist = CourseEffort::whereHas('course',function($q) use($id){
        $q->where('course_efforts.c_code','=',$id);
        })->get()->toArray();
        // $outcomes = Outcome::whereHas('category')->get();
// dd('outcomes');

        $coursesData['data']=$yearlist;
// dd($coursesData);

        echo json_encode($coursesData);
        exit;

    }

    public function showsemesters($id)
    {
        // dd($id);

        $semesterlist = CourseEffort::whereHas('course',function($q) use($id){
        $q->where('course_efforts.c_code','=',$id);
        })->get()->toArray();

        // $outcomes = Outcome::whereHas('category')->get();
        // dd($semesterlist);

        $coursesData['data']=$semesterlist;
        //  dd($coursesData);

        echo json_encode($coursesData);
        exit;

    }

    public function export()
    {
        // use Excel facade to export data, by passing in the UserExport class and the desired file name as arguments
        return Excel::download(new AssessmentExport, 'Courses_Assesment.xlsx');
    }
}
