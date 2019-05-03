<?php

namespace App\Http\Controllers;

//use App\Models\Certificate;
use Illuminate\Http\Request;
use Mail;
class CertificateController extends Controller{

    public function index(Request $request)
    {
        $data['nombre'] = $request->input('nombre');
        $data['centro'] = $request->input('centro');
        $data['tipo'] = $request->input('tipo');
        $data['subtipo'] = $request->input('subtipo');
        $data['fecha'] = $request->input('fecha');

        return view('certificate', $data);
    }
    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required',
            ]);
            Mail::send('certificate',
            array(
               'email' => $request->get('email'),
            ), function($message)
           {
           $message->from('daw2a05@abp-politecnics.com');
           $message->to($request->get('email'), 'Petlinks Helper')
           ->subject('Certificado de donación');
          });
       return back()->with('success', 'Thanks for contacting us!');
    }

}

?>
