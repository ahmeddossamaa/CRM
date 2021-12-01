@extends('layouts.app')

@php
    use App\Models\Employee;
    use App\Models\Customer;
@endphp

@section('content')
    <div class="container">
        <table class="table table-striped table-inverse w-100 text-center">
                    
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>Customer</th>
                    <th>Action</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($acts as $act)
                    <tr>
                        <td scope="row">{{ $act['id'] }}</td>
                        {{-- <td>{{ Employee::find($act['emp_id'])->first_name . " " . Employee::find($act['emp_id'])->second_name }}</td> --}}
                        {{-- <td>{{ Customer::find($act['cust_id'])->first_name . " " . Customer::find($act['cust_id'])->second_name }}</td> --}}

                        <td>{{ $act['emp_id'] }}</td>
                        <td>{{ $act['cust_id'] }}</td>
                        <td>{{ $act['action'] }}</td>
                        <td>{{ $act['updated_at'] }}</td>
                        <td>
                            <form action="{{ route('act.destroy', $act['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection