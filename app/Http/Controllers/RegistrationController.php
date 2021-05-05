<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function submit(RegistrationRequest $req) {
        $reg = new Registration();
        $reg->name = $req->input('name');
        $reg->password = $req->input('password');
        $reg->email = $req->input('email');
        $reg->save();
        return redirect()->route('home')->with('success', 'Registration complete!');
   }
}
