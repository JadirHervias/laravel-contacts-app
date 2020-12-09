<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\CreateContactRequest;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      if ($request) {
          $id = $request->get('id');
          $name = $request->get('name');
          $email = $request->get('email');
          $address = $request->get('address');
          $phoneNumber = $request->get('phone_number');

          $contacts = Contact::orderBy('id', 'ASC')
              ->id($id)
              ->name($name)
              ->email($email)
              ->address($address)
              ->phoneNumber($phoneNumber)
              ->paginate(15);
      } else {
          $contacts = Contact::latest()->paginate(15);
      }

      return view('contacts.index', compact('contacts'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        // Contact::updateOrCreate(['id' => $request->get('contactId')], [
        // 'name' => $request->get('name'),
        // 'address' => $request->get('address'),
        // 'email' => $request->get('email'),
        // 'phone_number' => $request->get('phone_number')]);

        Contact::create($request->all());
    
        return redirect()->route('contacts.index')
                        ->with('success','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(CreateContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        return redirect()->route('contacts.index')
                        ->with('success','Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

          return redirect()->route('contacts.index')
                        ->with('success','Contact deleted successfully');
    }
}
