@extends('layouts.base')

@push('styles')
<link href="{{asset('css/app.css')}}" rel="stylesheet"/>
@endpush

@section('title')
    Quizz
@endsection

@extends('components.navbar')

@section('content')
    @if (Session::has("success"))
        <h3 class="flash-message">{{Session::get("success")}}</h3>
    @endif

    <h1 class="title">Car Rent Apps</h1>

    <form action="{{url('/search/car')}}" method="get">
        <input type="search" name="" id="">
    </form>

    @foreach ($cars as $car)
        <table border="1">
            <tr>
                <td>Brand</td>
                <td>License Plate Number</td>
                <td>Rent Per Day</td>
                <td>Action</td>
            </tr>
            <tr>
                <td>{{$car->brand}}</td>
                <td>{{$car->license_plate_number}}</td>
                <td>{{$car->rent_per_day}}</td>
                @if ($car->status == "filled")
                    <td>Filled!</td>
                @elseif($car->status == "away")
                    <td><a href="{{url('/rent/car', $car->id)}}">Rent!</a></td>
                @endif
            </tr>
        </table>
    @endforeach
    <br/>

@endsection
