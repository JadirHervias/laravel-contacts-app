<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Cached\Storage\Memcached;

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

      $currentUser = Auth::user()->id;

      if ($request) {
          $id = $request->get('id');
          $name = $request->get('name');
          $lastName = $request->get('last_name');
          $email = $request->get('email');
          $address = $request->get('address');
          $phoneNumber = $request->get('phone_number');

          $contacts = Contact::orderBy('created_at', 'DESC')
              ->id($id)
              ->name($name)
              ->lastName($lastName)
              ->email($email)
              ->address($address)
              ->phoneNumber($phoneNumber)
              ->ownerId($currentUser)
              ->paginate(15);
            
      } else {
          $contacts = Contact::where('owner_id', '=', $currentUser)->paginate(15);
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

        $currentUser = Auth::user()->id;

        // 'store' is private
        $photoUrl = $request->file('photo')->storePublicly('contact-profiles', 's3');

        // Storage::setVisibility($photoUrl, 'public');

        $contact = Contact::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'photo_url' => $photoUrl,
            'birth_date' => $request->get('birth_date'),
            'phone_number' => $request->get('phone_number'),
            'owner_id' => $currentUser
        ]);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact created successfully.');
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
    public function update(UpdateContactRequest $request, Contact $contact)
    {

        $validRequest = array_filter($request->all(), function ($item) {
            if ($item != null) {
                return $item;
            }
        });

        if ($request->hasFile('photo')) {
            Storage::disk('s3')->delete($contact->photo_url);
            $newPhotoUrl = $request->file('photo')->storePublicly('contact-profiles', 's3');
            $contact->update([
                'photo_url' => $newPhotoUrl,
            ]);

            $contact->update($validRequest);

        } else {
            $contact->update($validRequest);
        }

        return redirect()
            ->route('contacts.index')
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
        Storage::disk('s3')->delete($contact->photo_url);
        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with('success','Contact deleted successfully');
    }
}
