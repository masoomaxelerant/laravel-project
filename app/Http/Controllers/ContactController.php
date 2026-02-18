<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\contactus;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contactus.contact');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        $request->validated();
        contactus::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'message' => request('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()
          ->route('contact.index')
          ->with('success', 'Thank you for your message. We will get back to you soon.');
    }
    /**
     * Display the specified resource.
     */
    public function show(contactus $contactus)
    {
        $contactus = contactus::all();
        return view('contactus.show', [
            'contactus' => $contactus,
        ]);
    }
}
