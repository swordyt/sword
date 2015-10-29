<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;
use Auth,Input,Redirect;
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
		/*$article->user_id = $request->input('user_id');
		$article->title = $request->input('title');
		$article->slug = $request->input('slug');
		$article->body = $request->input('body');
		$article->image = $request->input('user_id');*/
		$image = Input::file('image');
		if(!$image->isValid()){
			return Redirect::back()->withInput->withErrors('上传文件失败，请重新发表！');
		}
		$clientName = $image->getClientOriginalName();
		$tmpName = $image->getFileName();
		$realPath = $image->getRealPath();
		$extension = $image->getClientOriginalExtension();
		$newName = md5(date('ymdhis').$clientName).'.'.$extension;
		$image->move(app_path().'\\storage\\uploads\\',$newName);
		$article->image =$newName;
		$article->user_id = $request->input('user_id');
		$article->title = $request->input('title');
		$article->slug = $request->input('slug');
		$article->body = $request->input('body');
		if(!$article->save()){
			return Redirect::back()->withInput()->withErrors('文章发表失败，请重新发表！');
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
        //
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
