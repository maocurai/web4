<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AutorisationRequest;
use App\Models\News;
use App\Models\Registration;
use App\Models\Author;
use App\Models\Topic;

class AutorisationController extends Controller
{
    public function submit(AutorisationRequest $req) {
        $data = Registration::all();
        foreach($data as $el) {
            if(($el->password == $req->password) && ($el->email == $req->email))
                return redirect()->route('home')->with('success', 'Autorisation complete!');
                //Переадресация с данными сессии
        }
        return redirect()->route('home')->with('error', 'Wrong password or email');
    }

    public function allNews($showAllNews) {
        $news = ($showAllNews) ? News::all() : News::take(2)->get();
        return view('home', compact('news'));
    }
}
