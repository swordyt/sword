<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UtilsServiceProvider extends ServiceProvider
{
	 /**
     * 指定是否延缓提供者加载。
     *
     * @var bool
     */
   # protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\Service\Utils',function($app){
			return new Utils();
		});
    }
	/**
	*
	* 取得提供者所提供的服务。
	*
	
	public function provides(){
		return ['App\Http\Service\Utils\Utils'];
	}*/
}
