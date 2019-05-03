<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('info.contacta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
            ]);

           ContactUs::create($request->all());
            Mail::send('email',
            array(
               'name' => $request->get('name'),
               'email' => $request->get('email'),
               'user_message' => $request->get('message')
            ), function($message)
           {
           $message->from('daw2a05@abp-politecnics.com');
           $message->to('daw2a05@abp-politecnics.com', 'Petlinks Helper')
           ->subject('Nueva consulta');
          });
       return back()->with('success', 'Thanks for contacting us!');
    }
}
