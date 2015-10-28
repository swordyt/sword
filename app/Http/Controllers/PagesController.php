<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
class PagesController extends Controller
{
   public function show($id){
	   
	   return view('pages.show')->withPage(Page::find($id));
   }
}
