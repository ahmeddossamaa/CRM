@extends('layouts.app')

@section('content')
{{-- @php
    $count = 0;
@endphp --}}
    <div class="container">
        <div class="row">
            <div class="col-3 p-3">
                <div class="card">
                    <div class="card-header">Employee Data</div>
    
                    <div class="card-body">
                        <h6>Employee ID:</h6>
                        <h4>{{ $row['id'] }}</h4>
                        <h6>Employee Name:</h6>
                        <h4>{{ $row['first_name'] . " " . $row['second_name'] }}</h4>
                        <h6>Employee Status:</h6>
                        <h4>
                            @if ($row['available'] == 1)
                            Available
                            @else
                            Unavailable
                            @endif
                        </h4>
                        <h6>Responsible Admin:</h6>
                        <h4>{{ Auth::user($row['id'])->name }}</h4>
                        <a href="{{ url('customer/create/'. $row['id']) }}" class="btn btn-primary w-100 mt-2">Add new customer</a>
                    </div>
    
                </div>
            </div>

            <div class="col-9 p-3">
                <table class="table table-striped table-inverse w-100 text-center">
                    
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>View</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($customers as $cust)
                            {{-- @php
                                $count++;
                            @endphp --}}
                            <tr>
                                <td scope="row">{{ $cust['id'] }}</td>
                                <td>{{ $cust['first_name'] . " " . $cust['second_name'] }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('customer.show', $cust['id']) }}">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('customer.edit', $cust['id']) }}">Update</a>
                                </td>
                                <td>
                                    <form action="{{ route('customer.destroy', $cust['id']) }}" method="post">
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
    </div>
@endsection