@extends('layouts.layout')
@section('title', 'Login')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{route('login.store')}}" method="post">
                @csrf
                <h3 class="text-center text-dark">Login</h3>
                <x-input name="email" type="email" value="admin@admin.com"></x-input>
                <x-input name="password" type="password" value="admin"></x-input>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                </div>
                <div class="text-right mt-2">
                    <a href="/register" class="text-dark">Register here</a>
                </div>
            </form>
        </div>
    </div>
@endsection