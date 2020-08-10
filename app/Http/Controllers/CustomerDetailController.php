<?php

namespace App\Http\Controllers;

use App\models\CustomerDetail;
use Illuminate\Http\Request;

class CustomerDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerDetail= CustomerDetail::all();
        return view('backend.customerdetail.index', compact('customerDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customerdetail.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CustomerDetail::create($request->all());
        return redirect('dashboard/customerDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerDetail $customerDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerDetail $customerDetail)
    {
        return view('backend.customerdetail.update', compact('customerDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerDetail $customerDetail)
    {
        $customerDetail->update($request->all());
        return redirect('dashboard/customerDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerDetail $customerDetail)
    {
        $customerDetail->delete();
        return redirect('dashboard/customerDetail');
    }
}