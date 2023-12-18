@extends('layouts.base')

@section('title', 'Add Car')

@extends('components.navbar')

@section('content')
    <h1>Adding New Car</h1>

    <form action="{{url('/new/car')}}" method="post">
        @csrf
        <input type="text" name="brand" id="brand" placeholder="Brand...">
        <br/>
        <input type="text" name="type" id="type" placeholder="Type...">
        <br/>
        <input type="text" name="license_plate_number" id="license_plate_number" placeholder="License Plate Number...">
        <br/>
        <input type="number" name="rent_per_day" id="rent_per_day" placeholder="Rent per day...">
        <br/>
        <button type="submit">Add</button>
    </form>
@endsection