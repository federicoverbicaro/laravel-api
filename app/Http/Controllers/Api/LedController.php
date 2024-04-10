<?php

namespace App\Http\Controllers\Api;


use App\Models\Lead;
use App\Http\Controllers\Controller;
use App\Mail\NewContatct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LedController extends Controller
{
     public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ]);

        if($validator->fails() ){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('federico.verbicaro@icloud.com')->send(new NewContatct( $new_lead ));

        return response()->json([
            'success' => true
        ]);
     }
}
