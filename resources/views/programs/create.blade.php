@extends('layouts.app')

@section('title', 'Create Program')

@section('contents')
    <h1 class="mb-0">Add Program</h1>
    <hr />
    <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            {{-- <div class="col">
                <input type="text" name="id" class="form-control" placeholder="ID">
            </div> --}}
           <div class="col">
                <input type="text" name="pname" class="form-control" placeholder="Program Name">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">

                        <select name="cat_Id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>

                {{-- <input type="text" name="cat_name" class="form-control" placeholder="Categroy"> --}}
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
