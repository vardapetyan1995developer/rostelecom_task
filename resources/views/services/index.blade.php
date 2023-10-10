@extends('layouts.master')

@section('title', 'Services')

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
            <div class="col-md-10 m-auto">
                @if(session('success'))
                    <x-alert :message="session('success')" type="success" />
                @elseif(session('fail'))
                    <x-alert :message="session('fail')" type="danger" />
                @endif

                <div class="table-responsive">
                    <a href="{{ route('services.create') }}" class="btn btn-success btn-sm">Create new service</a>

                    <table class="table mt-2">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <th scope="row">{{ $services->firstItem() + $loop->index }}</th>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('services.edit', $service) }}" class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ route('services.delete', $service) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button onclick="confirmationDialog(event)" type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const confirmationDialog = (event) => {
            const result = confirm('Are you sure?')

            if(!result) event.preventDefault()
        }
    </script>
@endpush
