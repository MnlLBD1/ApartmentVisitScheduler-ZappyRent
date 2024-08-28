@extends('layouts.tenant')

@section('content')
    <h1>All Apartments</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Zone</th>
            <th>Available Slots</th>
            <th>Request Visit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($apartments as $apartment)
            <tr>
                <td>{{ $apartment->id }}</td>
                <td>{{ $apartment->zone }}</td>
                <td>{{ json_encode($apartment->available_slots) }}</td>
                <td>
                    <form action="{{ route('tenant.request_visit', $apartment->id) }}" method="POST">
                        @csrf
                        <input type="datetime-local" name="requested_date_time" required>
                        <button type="submit" class="btn btn-primary">Request Visit</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
