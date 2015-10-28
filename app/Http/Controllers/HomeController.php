<?php namespace App\Http\Controllers;
use App\Page;
use Auth;
class HomeController extends Controller {

	public function index(){
		return view('home')->withPages(Page::all());
	}
}