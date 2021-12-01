@php
    use App\Models\Employee;
@endphp

@extends('layouts.app')

@section('content')

<div class="container">

        
    {{-- @if (session('success'))
        <div class="bg-info w-100">
            {{ session('success') }}
        </div>
    @endif --}}

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body d-flex justify-content-between align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- {{ __('You are logged in!') }} --}}
                    <div>
                        <h3>Welcome, {{ Auth::user()->name }}!</h3>
                        <h4>There are the customers available</h4>
                        <h6 class="text-black-50">add a new cutomer?</h6>
                    </div>
                    <a class="btn btn-primary" href="{{ route('customer.create') }}">Add</a>
                </div>

            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center py-5">
        <table class="table table-striped m-auto w-100 text-center">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Emp ID</th>
                    <th>Created at</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td scope="row">{{ $row['id'] }}</td>
                        <td>{{ $row['first_name'] . " " . $row['second_name'] }}</td>
                        <td>{{ $row['email'] }}</td>
                        {{-- <td>
                            @php
                                $emp = Employee::all()->where('id', $row['emp_id']);
                            @endphp
                            {{ $emp[]['first_name'] . " " . $emp['second_name'] }}
                        </td> --}}
                        <td>{{ $row['emp_id'] }}</td>
                        <td>{{ $row['created_at'] }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('customer.show', $row['id']) }}">View</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('customer.edit', $row['id']) }}">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('customer.destroy', $row['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-primary" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
@endsection
