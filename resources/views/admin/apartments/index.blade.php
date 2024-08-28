@extends('layouts.admin')

@section('content')
    <h1>All Apartments</h1>
    <a href="{{ route('admin.apartments.create') }}" class="btn btn-primary">Add New Apartment</a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Zone</th>
            <th>Available Slots</th>
            <th>Runner</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($apartments as $apartment)
            <tr>
                <td>{{ $apartment->id }}</td>
                <td>{{ $apartment->zone }}</td>
                <td>{{ json_encode($apartment->available_slots) }}</td>
                <td>{{ $apartment->runner->full_name }}</td>
                <td>
                    <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
