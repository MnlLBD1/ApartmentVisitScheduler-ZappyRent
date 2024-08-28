@extends('layouts.runner')

@section('content')
    <h1>Your Schedule</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Apartment</th>
            <th>Zone</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($visits as $visit)
            <tr>
                <td>{{ $visit->visit_date }}</td>
                <td>{{ $visit->apartment->zone }}</td>
                <td>{{ $visit->apartment->zone }}</td>
                <td>{{ $visit->status->label }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
