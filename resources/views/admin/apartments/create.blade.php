@extends('layouts.admin')

@section('content')
    <h1>Add New Apartment</h1>

    <form action="{{ route('admin.apartments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="zone">Zone:</label>
            <input type="text" name="zone" id="zone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="available_slots">Available Slots:</label>
            <textarea name="available_slots" id="available_slots" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="runner_id">Assign Runner:</label>
            <select name="runner_id" id="runner_id" class="form-control" required>
                @foreach($runners as $runner)
                    <option value="{{ $runner->id }}">{{ $runner->full_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
