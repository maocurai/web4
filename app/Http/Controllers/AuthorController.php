<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\News;
use App\Models\Topic;

class AuthorController extends Controller
{
    public function authorNews($author) {
        $news = News::where('author_id', $author)->get();
        $authors_topics = array();
        foreach($news as $el) {
            foreach($el->topics()->pluck('name') as $tag) {
                if(!in_array($tag, $authors_topics)) {
                    array_push($authors_topics, $tag);
                }
            }
        }
        return view('authorsNews', compact('news', 'authors_topics'));
    }
}