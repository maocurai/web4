<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Topic;

class TagController extends Controller
{
    public function tagsNews($topic) {
         $news = News::all();
          $authors = array();
          foreach($news as $el) {
            foreach($el->topics->pluck('name') as $tag) {
              if(($tag == $topic) && !(in_array($el->authors->name, $authors))) {
                $authors[$el->authors->id] = $el->authors->name;
              }
            }
          }
        return view('topicPage', compact('news', 'topic', 'authors'));
    }
}
