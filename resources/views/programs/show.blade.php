@extends('layouts.app')

@section('title', 'Show Program')

@section('contents')
    <h1 class="mb-0">Detail Program</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Program Name</label>
            <input type="text" name="pname" class="form-control" placeholder="Program Name" value="{{ $programs->pname }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="cat_name" class="form-control" placeholder="Category Name" value="{{ $programs->category->cat_name }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $programs->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $programs->updated_at }}" readonly>
        </div>
    </div>
@endsection
