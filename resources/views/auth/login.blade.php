@extends('layouts.base')

@push('styles')
<link href="{{asset('css/login.css')}}" rel="stylesheet"/>
@endpush

@section('title')
    Login Form
@endsection

@extends('components.navbar')

@section('content')
    <form action="{{url('/login')}}" method="post">
        @csrf
        <input type="name" name="name" id="name"/>
        <br/>
        <button type="submit">Login</button>
    </form>

    @error('name')
        <h3>{{$message}}</h3>
    @enderror

    <h3>Don't have any account yet? <a href="{{url('/register')}}">register here</a></h3>
@endsection