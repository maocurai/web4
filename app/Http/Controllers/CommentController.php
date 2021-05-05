<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function submit(CommentRequest $req) {
        $reg = new Comments();
        $reg->name = $req->input('name');
        $reg->text = $req->input('text');
        $reg->save();
        return redirect()->route('comment')->with('success', 'Thank you for comment!');
   }

    public function allComments() {
        return view('comment', ['data' => Comments::all()]);
    }
}
