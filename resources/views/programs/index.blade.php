@extends('layouts.app')

@section('title', 'Home')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Of Programs</h1>
        <a href="{{ route('programs.create') }}" class="btn btn-primary">Add Program</a>
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
                <th>Program Name</th>
                <th>Category</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($programs->count() > 0)
                @foreach($programs as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->pname }}</td>
                        {{-- @foreach ($categories as $category) --}}
                        <td class="align-middle">{{ $rs->category->cat_name }}</td>
                        {{-- @endforeach --}}

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('programs.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('programs.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('programs.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="5">No Programs Added</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
@endsection
