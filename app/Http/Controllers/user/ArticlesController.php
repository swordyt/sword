<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;
use Auth,Input,Redirect,Utils;
class ArticlesController extends Controller
{
	public function index(){
		return view("articles.create")->withUserid(Auth::user()->id);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
	public function show($id)
	{
		if(strcasecmp($id,'MyArticles') != 0){
			return Redirect::back();
		}
		return view('articles.myhome')->withArticles(Article::MyArticles(Auth::user()->id)->get());
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
       $article = new Article();
		$image = Input::file('image');
		if(!empty($image)){
			if(!$image->isValid()){
			return Redirect::back()->withErrors(array('上传文件失败，请重新发表！'));
			}
			$clientName = $image->getClientOriginalName();
			$tmpName = $image->getFileName();
			$realPath = $image->getRealPath();
			$extension = $image->getClientOriginalExtension();
			$newName = md5(date('ymdhis').$clientName).'.'.$extension;
			$image->move(Utils::getUploadPath(),$newName);
			$article->image =$newName;
		}
		$article->user_id = $request->input('user_id');
		$article->title = $request->input('title');
		$article->slug = $request->input('slug');
		$article->body = $request->input('body');
		if(!$article->save()){
			return Redirect::back()->withErrors(array('文章发表失败，请重新发表！'));
		}
		return Redirect::to('/articles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		try{
        $article = Article::findOrFail($id);
		return view('articles.edit')->withArticle($article);
		}catch(Exception $e){
		Redirect::back()->withInput()->withErrors('文章不可修改.');
	}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	try{
		$user = Auth::user();
		$article = Article::findOrFail($id);
		if($user->id != $article->user_id){
		  return Redirect::back()->withErrors(array('文章修改失败！'));
		}
		$image = Input::file('image');
		if(!isset($image)){
			
		}else{
			$clientName = $image->getClientOriginalName();
			$tmpName = $image->getFileName();
			$realPath = $image->getRealPath();
			$extension = $image->getClientOriginalExtension();
			$newName = md5(date('ymdhis').$clientName).'.'.$extension;
			$image->move(Utils::getUploadPath(),$newName);
			$article->image = $newName;
			$article->image_name = $clientName;
		}
		$article->title=$request->input('title');
		$article->slug = $request->input('slug');
		$article->body = $request->input('body');
		if(!$article->save()){
			return Redirect::back()->withErrors(array("文章修改失败！"));
		}
		return view('articles.myhome')->withArticles(Article::MyArticles(Auth::user()->id)->get());
		
		
		
		
	}catch(Exception $e){
			Redirect::back()->withErrors(array('文章更新失败！'));
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
