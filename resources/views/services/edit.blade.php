@extends('layouts.master')

@section('title', 'Services|Edit')

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
                <h2>Update Service</h2>

                <form action="{{ route('services.update', $service) }}" method="post" class="mt-5">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="id" value="{{ $service->id }}">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $service->name }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10" placeholder="Content...">{{ $service->content }}</textarea>

                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
