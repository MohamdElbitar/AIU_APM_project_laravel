@extends('layouts.app')

@section('title', 'Show Outcome')

@section('contents')
    <h1 class="mb-0">Detail Course Offering</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="c_code" class="form-control" placeholder="Course" value="{{ $cefforts->c_code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Semester</label>
            <input type="text" name="semester" class="form-control" placeholder="Semester" value="{{ $cefforts->semester }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Year</label>
            <input type="text" name="year" class="form-control" placeholder="Year" value="{{ $cefforts->year }}" readonly>
        </div>
      
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $cefforts->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $cefforts->updated_at }}" readonly>
        </div>
    </div>
@endsection
