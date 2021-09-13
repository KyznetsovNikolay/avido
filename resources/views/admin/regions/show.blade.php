@extends('layouts.app')

@section('content')
    @include('admin.regions._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.regions.edit', $region) }}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{ route('admin.regions.update', $region) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $region->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $region->name }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $region->slug }}</td>
        </tr>
        </tbody>
    </table>

    @if(count($cities) > 0)
        <div class="p-3 mb-2 bg-light text-dark"><h4>Cities</h4></div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->slug }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <div class="p-3 mb-2 bg-light text-dark"><h4>There are no cities for this region yet.</h4></div>
    @endif
@endsection
