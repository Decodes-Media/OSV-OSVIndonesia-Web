<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Settings\ContactUsSetting;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index(): View
    {
        /** @var ContactUsSetting $setting */
        $setting = app(ContactUsSetting::class);

        return view('client.pages.contact-us', ['setting' => $setting]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:200',
            'phone' => 'required|numeric',
            'country' => 'required|max:200',
            'company_name' => 'required|max:200',
            'company_email' => 'required|email',
            'message' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('contact-us')->withErrors($validator)->withInput();
        }

        $request->merge([
            'metadata' => json_encode(['ip' => $request->ip()])
        ]);

        Contact::store($request->toArray());

        return back()->with('success', 'Thank You for Getting in Touch.');   
    }
}
