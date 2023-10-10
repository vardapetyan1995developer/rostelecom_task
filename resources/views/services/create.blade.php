@extends('layouts.master')

@section('title', 'Services|Create')

@push('styles')
    <style>
        * {
            box-shadow: none !important;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <h2>Create New Service</h2>

                <form action="{{ route('services.store') }}" method="post" class="mt-5">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10" placeholder="Content..."></textarea>

                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
