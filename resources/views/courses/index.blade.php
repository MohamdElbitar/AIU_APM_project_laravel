@extends('layouts.app')

@section('title', 'Home')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Of Courses</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div  class="table-responsive">
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Course Name</th>
                <th>Program</th>


                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($courses->count() > 0)
                @foreach($courses as $rs)
                    @foreach ($rs->cprogram as  $program )
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->code }}</td>
                        <td class="align-middle">{{ $rs->cname }}</td>
                        <td class="align-middle">{{ $program->pname }}</td>


                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('courses.show', $rs->code) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('courses.edit', $rs->code)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('courses.destroy', $rs->code) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">No courses Added</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
@endsection
