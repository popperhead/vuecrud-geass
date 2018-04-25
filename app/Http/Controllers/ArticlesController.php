<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles');
    }
    public function fetch(){
        $articles = \App\Articles::all();
        return $articles;
    }
    public function create(Request $r){
        
        $article = new Articles;
        $article->title=$r->title;
        $article->body=$r->body;
        if($article->save())
            return response()->json('New Artcle Created',200);
    }
    public function delete(Request $r)
    {        
        $deletedRow = \App\Articles::where('id', $r->id)->delete();
        return response()->json('Article Deleleted',200);
    }
    public function edit(Request $r)
    {
        $edit = \App\Articles::where('id', $r->id)    
            ->update(['title' => $r->title,
            'body' => $r->body]);
        if($edit==1)
            return response()->json('Article Updated',200);
        else
            return response()->json('Article Cannot Be Updated',200);
    }
}
