@extends('layouts.base')

@section('title', 'Rent Car')

@extends('components.navbar')

@section('content')
    <h1>Adding New Car</h1>

    <form action="{{url('/rent/car', $car->id)}}" method="post">
        @csrf
        <input type="date" name="start_rent" id="start_rent" placeholder="Start...">
        <br/>
        <input type="date" name="done_rent" id="done_rent" placeholder="End...">
        <br/>
        <input type="text" readonly aria-readonly value="{{$car->license_plate_number}}" name="license_plate_number" id="license_plate_number" placeholder="License Plate Number...">
        <br/>
        <button type="submit">Rent</button>
    </form>
@endsection