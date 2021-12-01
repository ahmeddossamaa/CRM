@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <form class="m-auto w-50" method="POST" action="{{ route('emp.update', $row['id']) }}">
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
                <label for="password" class="form-label">password</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ $row['password'] }}">
            </div>
            <div class="form-group row">
                <label for="status">Availablity</label>
                <select class="form-control" name="status" id="status">
                    @if ($row['available'] == 1)
                        <option value="1">Available</option>
                        <option value="0">Inavailable</option>
                    @else
                        <option value="0"active>Inavailable</option>
                        <option value="1">Available</option>
                    @endif
                </select>
            </div>
            <div class="form-group row">
                <input type="submit" id="submit" name="submit" class="btn btn-primary w-100" value="Update Employee">
                
            </div>
            @if (session('failed'))
                <div class="bg-danger w-100 p-2">
                    {{ session('failed') }}
                </div>
            @endif
        </form>
    </div>

@endsection