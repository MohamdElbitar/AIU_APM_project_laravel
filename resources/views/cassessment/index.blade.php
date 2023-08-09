@extends('layouts.app')

@section('title', 'Home')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">List Of Course Assessment</h2>
        <a href="{{ route('cassessments.create') }}" class="btn btn-primary">Add Course Assessment</a>
        <a class="btn btn-success" href="{{ route('cassessments.export') }}">Export data</a>
        {{-- <a class="btn btn-success" href="">Export data</a> --}}


    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif




    <!-- Add the new form for filtering -->
    <form action="{{ route('cassessments') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="semester" class="form-label">Select Semester:</label>
                <select name="semester" id="semester" class="form-select">
                    <option value="">All Semesters</option>
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                    <!-- Add more semester options as needed -->
                </select>
            </div>
            <div class="col-md-4">
                <label for="year" class="form-label">Enter Year:</label>
                <input type="number" name="year" id="year" class="form-control" placeholder="Enter Year">
            </div>
            <div class="col-md-4">
                <label for="c_code" class="form-label">Enter Course Code:</label>
                <input type="text" name="c_code" id="c_code" class="form-control" placeholder="Enter Course Code">
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Apply Filters</button>
            <a href="{{ route('cassessments') }}" class="btn btn-secondary">Clear Filters</a>
        </div>
    </form>



    <div  class="table-responsive">
    <table class="table table-hover" >
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>pname</th>
                <th>semester</th>
                <th>year</th>
                <th>Course Name</th>
                <th>Outcome Code</th>
                <th>Degree by P%</th>
                <th>Degree by AVG</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($cassessments->count() > 0)
                @foreach($cassessments as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->pname }}</td>
                        <td class="align-middle">{{ $rs->semester }}</td>
                        <td class="align-middle">{{ $rs->year }}</td>
                        <td class="align-middle">{{ $rs->c_code }}</td>
                        <td class="align-middle">{{ $rs->abet_code }}</td>
                        <td class="align-middle">{{ $rs->p_num }}</td>
                        <td class="align-middle">{{ $rs->avg_num }}</td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('cassessments.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('cassessments.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('cassessments.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                 <!-- Pagination links -->

            @else
                <tr>
                    <td class="text-center" colspan="5">No courses Added</td>
                </tr>
            @endif
        </tbody>

    </table>

    {{ $cassessments->links() }}

</div>
@endsection
