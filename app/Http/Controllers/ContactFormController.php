<?php

namespace App\Http\Controllers;

use App\models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactForm=ContactForm::all();
        return view('backend.contactform.index', compact('contactForm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contactform.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ContactForm::create($request->all());
        return redirect('dashboard/contactform');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactForm $contactForm)
    {
        $contactForm = ContactForm::all();
        return view('backend.contactform.update', compact('contactForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactForm $contactForm)
    {
        $contactForm->update($request->all());
        return redirect('dashboard/contactform');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactForm $contactForm)
    {
        $contactForm->delete();
        return redirect('dashboard/contactform');
    }
}
