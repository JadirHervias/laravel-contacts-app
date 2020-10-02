<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\CreateContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts', [
            'data' => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        try {
            Contact::updateOrCreate(['id' => $request->get('id')], [
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'email' => $request->get('email'),
                'phone_number' => $request->get('phone_number')
            ]);

            return response()->json([
                'success'=>'Contacto guardado correctamente'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error'=> $e
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'success'=>'Contacto eliminado correctamente'
        ], 200);
    }
}
