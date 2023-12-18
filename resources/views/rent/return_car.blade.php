@extends('layouts.base')

@section('title', 'Rent Car')

@extends('components.navbar')

@section('content')
    <h1>Adding New Car</h1>

    <form action="{{url('/return/car', $car_rented_away->id)}}" method="post">
        @csrf
        <input type="text" readonly aria-readonly value="{{$car_rented_away->license_plate_number}}" name="license_plate_number" id="license_plate_number" placeholder="License Plate Number...">
        <br/>
        <button type="submit">Return</button>
    </form>
@endsection