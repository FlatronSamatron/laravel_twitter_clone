@extends('layouts.layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6">
        <form class="form mt-5" action="{{route('register.store')}}" method="post">
            @csrf
            <h3 class="text-center text-dark">Register</h3>
            <x-input name="name" type="text"></x-input>
            <x-input name="email" type="email"></x-input>
            <x-input name="password" type="password"></x-input>
            <x-input name="password_confirmation" type="password" title="Confirm Password"></x-input>
            <div class="form-group">
                <label for="remember-me" class="text-dark"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
            </div>
            <div class="text-right mt-2">
                <a href="/login" class="text-dark">Login here</a>
            </div>
        </form>
    </div>
</div>
@endsection