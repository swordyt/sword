<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Redirect,Utils;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		dd('ss');
		return Utils::getUploadPath();
        return view('articles.home')->withArticles(Article::all());
		#dd(Article::all());
		
    }
	    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('articles.show')->withArticle(Article::find($id));
    }
}
