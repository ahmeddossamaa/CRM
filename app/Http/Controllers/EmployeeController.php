<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Customer;
use App\Models\Employee;
use Dotenv\Validator;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        
        $emp = Employee::all()
            ->where('user_id', $user_id);

        return view('home', [ 'rows' => $emp ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emp.create_emp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'fname' => 'required',
                'sname' => 'required',
                'email' => 'required',
                'password' => 'required',
                'status' => 'required'
            ]);

            $emp = new Employee();
            $emp->first_name = $request->input('fname');
            $emp->second_name = $request->input('sname');
            $emp->email = $request->input('email');
            $emp->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
            $emp->available = $request->input('status');
            $emp->user_id = Auth::user()->id;
            $emp->save();

            return redirect('home')->with('success', 'Employee Added Successfully');
        } catch (\Throwable $th) {
            return redirect('home/create')->with('failed', 'Please try again, fill the form or try another email');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cust = new CustomerController();
        // $cust->getCustomers($id);
        $cust = Customer::all()->where('emp_id', $id);
        $emp = Employee::find($id);
        return view('admin.emp.single_emp', [
            'row' => $emp,
            'customers' => $cust
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);
        return view('admin.emp.edit_emp', [
            'row' => $emp
        ]);
        // return dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'fname' => 'required',
            'sname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);

        $emp = Employee::find($id);
        $emp->first_name = $request->input('fname');
        $emp->second_name = $request->input('sname');
        $emp->email = $request->input('email');
        $emp->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $emp->available = $request->input('status');
        $emp->save();

        return redirect('home')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect('home');
    }
}
