<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Information;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\TestEmail;
use App\Models\ContactInformation;

class ContactController extends Controller
{
    public function index()
    {
        $information = Information::first();
        $contact_information = ContactInformation::first();

        return view('contacts.index', compact('information', 'contact_information'));
    }

    public function test_view()
    {
        return view('emails.contact');
    }
    public function store(Request $request)
    {
        try {
            $information = Information::first();

            $this->validate($request, [
                'name' => 'required',
                'subject' => 'required',
                'handphone' => 'required',
                'email' => 'required|email',
                'message' => 'required|string',
            ], [
                'name.required' => 'Name is required.',
                'subject.required' => 'Subject is required.',
                'handphone.required' => 'Handphone is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be in a valid format.',
                'message.required' => 'Message is required.',
                'message.string' => 'Message must be a string.',
            ]);

            $formData = $request->all();

            Contact::create($formData);

            Mail::to($formData['email'])->send(new TestEmail($formData));

            Mail::to($information->email)->send(new ContactMail($formData));

            return redirect()->route('home#contactForm')->with(['success' => 'You have already submitted the form!']);
        } catch (\Exception $e) {
            return redirect()->route('home#contactForm')->with('error', 'Failed to save the data. Put in a valid format.');
        }
    }

    public function storeAll(Request $request)
    {
        try {
            $information = Information::first();

            $this->validate($request, [
                'name' => 'required',
                'subject' => 'required',
                'handphone' => 'required',
                'email' => 'required|email',
                'message' => 'required|string',
            ], [
                'name.required' => 'Name is required.',
                'subject.required' => 'Subject is required.',
                'handphone.required' => 'Handphone is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be in a valid format.',
                'message.required' => 'Message is required.',
                'message.string' => 'Message must be a string.',
            ]);

            $formData = $request->all();

            Contact::create($formData);

            Mail::to($formData['email'])->send(new TestEmail($formData));

            Mail::to($information->email)->send(new ContactMail($formData));

            return redirect()->back()->with('success', 'You have successfully submitted the form!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save the data. Please try again.');
        }
    }
}
