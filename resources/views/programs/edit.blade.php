@extends('layouts.app')

@section('title', 'Edit Program')

@section('contents')
    <h1 class="mb-0">Edit Program</h1>
    <hr />
    <form action="{{ route('outcomes.update', $outcome->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="cname" class="form-control" placeholder="Course Name" value="{{ $outcome->cname }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="s1" class="form-control" placeholder="S1" value="{{ $outcome->s1 }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="s2" class="form-control" placeholder="S2" value="{{ $outcome->s2 }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="s3" placeholder="S3" value="{{ $outcome->s3 }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
