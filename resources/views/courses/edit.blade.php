@extends('layouts.app')

@section('title', 'Edit Course')

@section('contents')
    <h1 class="mb-0">Edit Course</h1>
    <hr />
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Code</label>
                <input type="text" name="code" class="form-control" placeholder="Course Name" value="{{ $outcome->cname }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" name="cname" class="form-control" placeholder="S1" value="{{ $outcome->s1 }}" >
            </div>
        </div>
        
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
