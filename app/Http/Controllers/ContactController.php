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
                // 'subject' => 'required',
                'handphone' => 'required',
                'email' => 'required|email',
                'message' => 'required|string',
            ], [
                'name.required' => 'Name is required.',
                // 'subject.required' => 'Subject is required.',
                'handphone.required' => 'Handphone is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be in a valid format.',
                'message.required' => 'Message is required.',
                'message.string' => 'Message must be a string.',
            ]);

            $formData = $request->all();

            Contact::create($formData);
            // Get the brochure file path from the database
            $brochure = ContactInformation::first()->file;

            // Construct the full URL for the brochure
            $brochureUrl = env('APP_URL') . $brochure;

            // Store the brochure URL in session
            session()->flash('success', 'You have successfully submitted the form! Your brochure download will start shortly.');
            session()->flash('brochureUrl', $brochureUrl);

            return redirect()->route('home', ['#contactForm'])->with(['success' => 'You have already submitted the form!']);
        } catch (\Exception $e) {
            return redirect()->route('home', ['#contactForm'])->with('error', 'Failed to save the data. Put in a valid format.');
        }
    }

    public function storeAll(Request $request)
    {
        try {
            $information = Information::first();

            $this->validate($request, [
                'name' => 'required',
                // 'subject' => 'required',
                'handphone' => 'required',
                'email' => 'required|email',
                'message' => 'required|string',
            ], [
                'name.required' => 'Name is required.',
                // 'subject.required' => 'Subject is required.',
                'handphone.required' => 'Handphone is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be in a valid format.',
                'message.required' => 'Message is required.',
                'message.string' => 'Message must be a string.',
            ]);

            $formData = $request->all();

            Contact::create($formData);

            // Mail::to($formData['email'])->send(new TestEmail($formData));

            // Mail::to($information->email)->send(new ContactMail($formData));

            $brochure = ContactInformation::first()->file;

            // Construct the full URL for the brochure
            $brochureUrl = env('APP_URL') . $brochure;

            // Store the brochure URL in session
            session()->flash('success', 'You have successfully submitted the form! Your brochure download will start shortly.');
            session()->flash('brochureUrl', $brochureUrl);

            // Return response with success message and brochure URL
            return redirect()->route('home', ['#contactForm'])->with(['success' => 'You have already submitted the form!']);


            // return redirect()->back()->with('success', 'You have successfully submitted the form!');
        } catch (\Exception $e) {
            return redirect()->route('home', ['#contactForm'])->with('error', 'Failed to save the data. Put in a valid format.');
        }
    }

    public function downloadBrochure()
    {
        // Check if there is a brochure URL in the session
        if (session()->has('brochureUrl')) {
            $brochureUrl = session('brochureUrl');

            // Remove the brochure URL from the session
            session()->forget('brochureUrl');

            // Redirect the user to the brochure URL
            return redirect($brochureUrl);
        }

        // If no brochure URL in the session, redirect back with an error
        return redirect()->back()->with('error', 'Brochure file not found.');
    }
}
