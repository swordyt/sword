<?php namespace App\Http\Service;
class Utils {
	public  function getUploadPath(){
		if(stristr(php_uname('s'),'windows')){
			return Utiles::getWinPath();
		}elseif(stristr(php_uname('s'),'linux')){
			return Utiles::getLinuxPath();
		}
	}
	private  function getWinPath(){
		return app_path().'\\storage\\uploads\\';
	}
	private  function getLinuxPath(){
		return app_path().'/storage/uploads/';
	}
}
?>