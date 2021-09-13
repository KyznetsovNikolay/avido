@extends('layouts.app')

@section('content')
    @include('admin.regions._nav')

    <p><a href="{{ route('admin.regions.create') }}" class="btn btn-success">Add Region</a></p>

    @if(count($regions) > 0)
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($regions as $region)
            <tr>
                <td><a href="{{ route('admin.regions.show', $region) }}">{{ $region->name }}</a></td>
                <td>{{ $region->slug }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @else
        <div class="p-3 mb-2 bg-light text-dark"><h4>There are no regions yet.</h4></div>
    @endif
@endsection
