@extends('layouts.app')

@section('title', 'Create Course Effort')

@section('contents')
    <h1 class="mb-0">Add Course Offering</h1>
    <hr />
    <form action="{{ route('cefforts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            {{-- <div class="col">
                <input type="text" name="id" class="form-control" placeholder="ID">
            </div> --}}
           <div class="col">
                {{-- <input type="text" name="c_code" class="form-control" placeholder="course Code"> --}}
                <select name="c_code" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="">--Select Course--</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->code }}">{{ $course->code }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                {{-- <input type="text" name="semester" class="form-control" placeholder="Semester"> --}}
                <select name="semester" class="form-control">
                    <option value="">--Select Semester--</option>
                    <option value="fall">Fall</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>

                  </select>
            </div>
            <div class="col">
                <input type="number" name="year" min="1900" max="2099" step="1" value="2020" class="form-control" placeholder="Year"/>

            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
