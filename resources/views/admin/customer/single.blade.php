@extends('layouts.app')
@php
    use App\Models\Employee;
    $emp = Employee::find($row['emp_id']);
@endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 p-3">
                <div class="card">
                    <div class="card-header">Customer Data</div>
    
                    <div class="card-body">
                        <h6>Customer ID:</h6>
                        <h4>{{ $row['id'] }}</h4>
                        <h6>Customer Name:</h6>
                        <h4>{{ $row['first_name'] . " " . $row['second_name'] }}</h4>
                        <h6>Customer Email:</h6>
                        <h4>{{ $row['email'] }}</h4>
                        <h6>Responsible Employee:</h6>
                        <h4>{{ $emp->first_name . " " . $emp->second_name }}</h4>
                        {{-- <a href="{{ url('customer/create/'. $row['id']) }}" class="btn btn-primary w-100 mt-2">Add new customer</a> --}}
                        {{-- <a href="" class="btn btn-primary w-100 my-1">Call</a>
                        <a href="" class="btn btn-primary w-100 my-1">Visit</a>
                        <a href="" class="btn btn-primary w-100 my-1">Follow Up</a> --}}
                        <form action="{{ url('act/store/'. $row['id'] . "/" . $row['emp_id'] ) }}" method="post">
                            @csrf
                            @method('POST')
                            <select name="actions" id="actions" class="form-control">
                                <option value="Call">Call</option>
                                <option value="Visit">Visit</option>
                                <option value="Follow Up">Follow Up</option>
                            </select>
                            <input type="submit" class="btn btn-primary my-1 w-100" value="Make Action">
                        </form>
                    </div>
    
                </div>
            </div>

            <div class="col-8 p-3">
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
        </div>
    </div>
@endsection