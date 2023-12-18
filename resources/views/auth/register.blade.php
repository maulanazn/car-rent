@extends('layouts.base')

@push('styles')
<link href="{{asset('css/register.css')}}" rel="stylesheet"/>
@endpush

@extends('components.navbar')

@section('title')
    Register Form
@endsection

@section('content')
    <form action="{{url('/register')}}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Name..."/>
        <br/>
        <textarea name="address" id="address" cols="30" rows="10"  placeholder="Address..."></textarea>
        <br/>
        <input type="tel" name="phone" id="phone" placeholder="Phone..."/>
        <br/>
        <input type="text" name="driver_license_number" id="driver_license_number" placeholder="Driver License Number..."/>
        <br/>
        <button type="submit">Register</button>
    </form>

    @error('name')
        <h1>{{$message}}</h1>
    @enderror

    @error('address')
        <h1>{{$message}}</h1>
    @enderror
    
    @error('phone')
        <h1>{{$message}}</h1>
    @enderror

    @error('driver_license_number')
        <h1>{{$message}}</h1>
    @enderror

    <h3>Have an account? <a href="{{url('/login')}}">login here</a></h3>
@endsection