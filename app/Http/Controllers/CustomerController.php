<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Action;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    /*
     * Display customers assigned to an employee
    */
    public function getCustomers($id){
        $cust = Customer::all()->where('emp_id', $id);
        return $cust;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust = Customer::all();
        return view('admin.customer.index', [
            'rows' => $cust
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp = Employee::all();
        return view('admin.customer.create', [
            'rows' => $emp
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWithId($id)
    {
        $employees = Employee::all()->where('id', !($id));
        return view('admin.customer.create_cust', [
            'emp' => $id,
            'rows' => $employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'fname' => 'required',
            'sname' => 'required',
            'email' => 'required',
            'emp' => 'required'
        ]);

        $cust = new Customer();

        $cust->first_name = $request->input('fname');
        $cust->second_name = $request->input('sname');
        $cust->email = $request->input('email');
        $cust->emp_id = $request->input('emp');
        $cust->save();

        return redirect('customer')->with('success', 'Customer add successfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWithId(Request $request, $id)
    {

        $this->validate($request, [
            'fname' => 'required',
            'sname' => 'required',
            'email' => 'required',
        ]);

        $cust = new Customer();

        $cust->first_name = $request->input('fname');
        $cust->second_name = $request->input('sname');
        $cust->email = $request->input('email');
        $cust->emp_id = $id;
        $cust->save();

        return redirect('emp/' . $id)->with('success', 'Customer add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $act = Action::all()->where('cust_id', $id);
        $cust = Customer::find($id);
        return view('admin.customer.single', [
            'row' => $cust,
            'acts' => $act
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
        $cust = Customer::find($id);
        return view('admin.customer.edit_cust', [
            'row' => $cust
        ]);
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
        ]);

        $cust = Customer::find($id);

        $cust->first_name = $request->input('fname');
        $cust->second_name = $request->input('sname');
        $cust->email = $request->input('email');
        $cust->save();

        return redirect('customer')->with('success', 'Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('customer')->with('success', 'Customer Deleted Successfully');
    }
}
