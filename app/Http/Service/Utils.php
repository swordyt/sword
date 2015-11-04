<?php namespace App\Http\Service;
class Utils {
	public  function getUploadPath(){
		if(stristr(php_uname('s'),'windows')){
			return $this->getWinPath();
		}elseif(stristr(php_uname('s'),'linux')){
			return $this->getLinuxPath();
		}
	}
	public function doPost($url,$data){
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_POST,$url);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
			$response = curl_exec($ch);
			return $response;
		}
	private  function getWinPath(){
		return app_path().'\\storage\\uploads\\';
	}
	private  function getLinuxPath(){
		return app_path().'/storage/uploads/';
	}
}
?>