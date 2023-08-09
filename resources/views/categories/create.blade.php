@extends('layouts.app')

@section('title', 'Create Category')

@section('contents')
    <h1 class="mb-0">Add Category</h1>
    <hr />
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            {{-- <div class="col">
                <input type="text" name="id" class="form-control" placeholder="ID">
            </div> --}}
           <div class="col">
                <input type="text" name="cat_name" class="form-control" placeholder="Category Name">
            </div>
        </div>


        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
