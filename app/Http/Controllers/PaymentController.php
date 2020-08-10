<?php

namespace App\Http\Controllers;

use App\models\Payment;
use App\models\CustomerDetail;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment=Payment::all();
        return view('backend.payment.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customerDetail= CustomerDetail::all();
        return view('backend.payment.create', compact('customerDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payment::create($request->all());
        return redirect('dashboard/payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $customerDetail= CustomerDetail::all();
        return view('backend.payment.update', compact('customerDetail', 'payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->all());
        return redirect('dashboard/payment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect('dashboard/payment');
    }
}
