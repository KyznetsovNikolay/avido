@extends('layouts.app')

@section('content')
    @include('admin.regions._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{ route('admin.cities.destroy', $city) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $city->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $city->name }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $city->slug }}</td>
        </tr>
        </tbody>
    </table>
@endsection
