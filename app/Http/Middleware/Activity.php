<?php
namespace App\Http\Middleware;
use Closure;
class Activity{
	// handle方法 为固定名称
	public function handle($request,Closure $next){
		if(time()<strtotime('2018-5-2')){
			return redirect('activity0');
		}
		return $next($request);
	}
}