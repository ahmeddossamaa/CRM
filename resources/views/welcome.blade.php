@extends('layouts.app')

@section('content')
    <div class="container text-center">
        
        @if (!(Auth::user()))
            <h1 class="text-black-50">Welcome To CRM</h1>
            {{-- <h3 class="text-black-50">Login as?</h3>
            <div class="row py-3 d-flex justify-content-around align-items-center">
                <div class="col-4 p-3">
                    <h1><a href="{{ route('login') }}">Admin</a></h1>
                </div>
                <div class="col-4 p-3">
                    <h1><a href="">Employee</a></h1>
                </div>
            </div> --}}
        @else
            <h1 class="text-black-50">{{ Auth::user()->name }}</h1>
        @endif

    </div>
@endsection
{{-- 
@section('style')
    <style>
        .col-4{
            height: 300px;
            width: 300px;
            box-shadow: 0px 0 1px #aaa;
            border-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection --}}