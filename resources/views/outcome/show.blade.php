@extends('layouts.app')

@section('title', 'Show Outcome')

@section('contents')
    <h1 class="mb-0">Detail Outcome</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">ABet Code</label>
            <input type="text" name="abet_code" class="form-control" placeholder="Abet Code" value="{{ $outcome->abet_code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $outcome->description }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $outcome->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $outcome->updated_at }}" readonly>
        </div>
    </div>
@endsection
