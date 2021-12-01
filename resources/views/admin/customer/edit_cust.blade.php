@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="m-auto w-50" method="POST" action="{{ route('customer.update', $row['id']) }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="fname" class="form-label">First Name</label>
                <input type="name" id="fname" name="fname" class="form-control" value="{{ $row['first_name'] }}">
            </div>
            <div class="form-group row">
                <label for="sname" class="form-label">Second Name</label>
                <input type="name" id="sname" name="sname" class="form-control" value="{{ $row['second_name'] }}">
            </div>
            <div class="form-group row">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $row['email'] }}">
            </div>
            <div class="form-group row">
                <input type="submit" id="submit" name="submit" class="btn btn-primary w-100" value="Update Customer">
            </div>
            @if (session('failed'))
                <div class="bg-danger w-100 p-2">
                    {{ session('failed') }}
                </div>
            @endif
        </form>
    </div>
@endsection