@extends('layouts.app')

@section('title', 'Home')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Of Course Offering</h1>
        <a href="{{ route('cefforts.create') }}" class="btn btn-primary">Add Course Offering</a>
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
                <th>Course</th>
                <th>Semester</th>
                <th>Year</th>


                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($cefforts->count() > 0)
                @foreach($cefforts as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->c_code }}</td>
                        <td class="align-middle">{{ $rs->semester }}</td>
                        <td class="align-middle">{{ $rs->year}}</td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('cefforts.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('cefforts.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('cefforts.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">No Course Offering Added</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
@endsection
