@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="container">
            <form class="m-auto w-50" method="POST" action="{{ route('customer.store') }}">
                @csrf
                @method('POST')
                <div class="form-group row">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="name" id="fname" name="fname" class="form-control">
                </div>
                <div class="form-group row">
                    <label for="sname" class="form-label">Second Name</label>
                    <input type="name" id="sname" name="sname" class="form-control">
                </div>
                <div class="form-group row">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group row">
                    <select name="emp" id="emp" class="form-control text-black-50">
                        @foreach ($rows as $row)
                            <option value="{{$row['id']}}">{{ $row['first_name'] . " " . $row['second_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <input type="submit" id="submit" name="submit" class="btn btn-primary w-100" value="Add Customer">
                </div>
                @if (session('failed'))
                    <div class="bg-danger w-100 p-2">
                        {{ session('failed') }}
                    </div>
                @endif
            </form>
        </div>
    </div>

@endsection