@extends('layouts.app')

@section('title', 'Create Outcome')

@section('contents')
    <h1 class="mb-0">Add Outcome</h1>
    <hr />
    <form action="{{ route('outcomes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            {{-- <div class="col">
                <input type="text" name="id" class="form-control" placeholder="ID">
            </div> --}}
           <div class="col">
                <input type="text" name="abet_code" class="form-control" placeholder="ABet Code">
            </div>
            <div class="col">

                <select name="cat_Id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="">--Select Category--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
