<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect,Input;
use App\Comment;
class CommentsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {	
		$comment = new Comment();
		$comment->nickname = Input::get('nickname');
		$comment->email = Input::get('email');
		$comment->website = Input::get('website');
		$comment->content = Input::get('content');
		$comment->page_id = Input::get('page_id');
		
		
			if($comment->save())
			{
				return Redirect::back();
			}else{
				return Redirect::back()->withInput()-withErrors('评论发表失败！');
			}
   /*
	if(Comment::create(Input::except(['_token']))){
		return Redirect::back();
	}else{
		return Redirect::back()->withInput()->withErrors('评论发表失败！');
	} */
	
	} 
}
