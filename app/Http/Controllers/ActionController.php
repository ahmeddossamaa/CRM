<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\cr;
use App\Models\Employee;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $act = Action::all();
        // $fsql = 'SELECT * FROM employees WHERE user_id = Auth::user()->id';
        // $sql = 'SELECT * FROM actions WHERE emp_id <> ' . $fsql;

        return view('admin.action.index', [
            'acts' => $act,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $id2)
    {
        $act = new Action();

        $act->cust_id = $id;
        $act->emp_id = $id2;
        $act->action = $request->input('actions');
        $act->save();

        return redirect('customer/' . $id)->with('success', 'Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Action::destroy($id);
        return redirect('/act')->with('success', 'Action Deleted Successfully');
    }
}
