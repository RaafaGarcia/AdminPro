<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMail;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class MailController extends Controller
{
    public function contacto(Request $request){
        
        $data = $request->all();
       try {
            Mail::to('contacto@cresermexico.com.mx')->send(new ContactoMail($data));
       } catch (\Throwable $th) {    
        FacadesLog::info('Code: '.$th->getCode().', Message: '.$th->getMessage().', File: '.$th->getFile().', Line: '.$th->getLine());
       
        // abort(404);
        return back()->withErrors((object) array('page' => 'No es posible enviar el mensaje, intentelo mas tarde'));
       }
      

        return back();
    }
}
