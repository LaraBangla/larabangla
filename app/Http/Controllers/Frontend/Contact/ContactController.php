<?php

namespace App\Http\Controllers\Frontend\Contact;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.contact');
    }

    // store contact message
    public function store(Request $request)
    {
        // validate data
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:255',
                'mobile' => 'nullable|regex:/(01)[0-9]{9}/|size:11',
                'subject' => 'required|max:255',
                'message' => 'required|max:5000',
                'g-recaptcha-response' => 'required|captcha'
            ],
            [
                'name.required' => 'নাম ক্ষেত্রটি পূরণ করতে হবে',
                'name.max' => 'নাম ৫০ অক্ষরের বেশি হওয়া উচিত নয়।',
                'email.required' => 'ইমেইল ক্ষেত্রটি পূরণ করতে হবে',
                'email.email' => 'এই ক্ষেত্রটি অবশ্যয় ইমেইল হতে হবে',
                'email.max' => 'ইমেইল ২৫৫ অক্ষরের বেশি হওয়া উচিত নয়।',
                'mobile.regex' => 'অনুগ্রহ করে আপনার ১১ ডিজিটের মোবাইল নাম্বার প্রবেশ করান',
                'mobile.size' => 'মোবাইল নাম্বার সর্বচ্চ ১১ ডিজিটের বেশি হবে না।',
                'subject.required' => 'বিষয় ক্ষেত্রটি পূরণ করতে হবে',
                'subject.max' => 'বিষয় ২৫৫ অক্ষরের বেশি হওয়া উচিত নয়।',
                'message.required' => 'বার্তা ক্ষেত্রটি পূরণ করতে হবে',
                'message.max' => 'বিষয় ৫০০০ অক্ষরের বেশি হওয়া উচিত নয়।',
                'g-recaptcha-response.required' => 'অনুগ্রহ করে যাচাই করুন যে আপনি রোবট নন।',
                'g-recaptcha-response.captcha' => 'ক্যাপচা ত্রুটি! পরে আবার চেষ্টা করুন বা সাইট অ্যাডমিনের সাথে যোগাযোগ করুন।'
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        if (Auth::check())
        {
            $data['user_id'] = Auth::id();
        }

        // store data
        $store = Contact::create($data);
        if ($store)
        {
            notify()->success('We have received you message! Thank you.', 'Successful');
            return back();
        }
        else
        {
            notify()->error('Something went to wrong!', 'Failed');
            return back();
        }
    }
}
