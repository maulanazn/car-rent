@extends('layouts.base')

@section('title', 'Profile')

@extends('components.navbar')

@section('content')
    <a href="{{url('/new/car')}}">Add Car</a>

    <h1>Your Rented Car</h1>

    <table border="1">
        <tr>
            <td>Start rent</td>
            <td>Done rent</td>
            <td>License Plate Number</td>
            <td>Return Car</td>
        </tr>
        @foreach ($rented_cars as $rented_car)
            <tr>
                <td>{{$rented_car->start_rent}}</td>
                <td>{{$rented_car->done_rent}}</td>
                <td>{{$rented_car->license_plate_number}}</td>
                <td><a href="{{url('/return/car', $rented_car->id)}}">Return</a></td>
            </tr>
        @endforeach
    </table>
@endsection