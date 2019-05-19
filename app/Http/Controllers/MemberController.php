<?php

namespace App\Http\Controllers;
use App\Member;
class MemberController extends Controller{
	public function info($id){
		 return $id;
	}
	public function bieming(){
		return route('memberinfo');
		// return view('member-info');
	}
	public function showview(){
	      return view('info');
	}
	/**
	 * 输入变量到模板member/info.blade.php
	 */
    public function showmemberview(){
	      return view('member/info',[
	      	'name'=>'天蝎座',
	      	'age'=>26
	      ]);
	}
	/**
	 * 调用模型层
	 */
	public function membermodel(){
	      return Member::getMember();
	}

}