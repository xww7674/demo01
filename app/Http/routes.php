<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
// 路由参数
// Route::get('user/{id}', function ($id) {
//     return 'Hello '.$id;
// });
// 路由别名
Route::get('member/member-center',['as'=>'center',function(){
	return route('center');
}]);
// 路由群组
Route::group(['prefix'=>'member'],function(){
	Route::get('user/center',['as'=>'center',function(){
		return route('center');
	}]);
	Route::any('multies',function(){
		return 'member-multy2';
	});
});
// 关联控制器
Route::any('member/{id}',[
	'uses'=>'MemberController@info',
])->where('id','[0-9]+');
Route::any('bieming/info',[
	'uses'=>'MemberController@bieming',
	'as'=>'memberinfo'
]);
// 打开视图
Route::any('member/showview',[
	'uses'=>'MemberController@showview',
]);
// 输出变量的视图模板
Route::any('member/showmemberview',[
	'uses'=>'MemberController@showmemberview',
]);
// 控制器调用模型层
Route::any('member/membermodel',[
	'uses'=>'MemberController@membermodel',
]);
// 使用DB facade 实现CURD
Route::any('test1',['uses'=>'StudentController@test1',]);
// 使用查询构造器 实现CURD
Route::any('test2',['uses'=>'StudentController@query1',]);
Route::any('test3',['uses'=>'StudentController@query2',]);
Route::any('test4',['uses'=>'StudentController@query3',]);
Route::any('test5',['uses'=>'StudentController@query4',]);
Route::any('test6',['uses'=>'StudentController@query5',]);
// ORM 实现CURD
Route::any('orm1',['uses'=>'StudentController@orm1',]);
Route::any('orm2',['uses'=>'StudentController@orm2',]);
Route::any('orm3',['uses'=>'StudentController@orm3',]);
Route::any('orm4',['uses'=>'StudentController@orm4',]);
// 模板继承
Route::any('sec1',['uses'=>'StudentController@section1',]);
// 模板中的url
// 测试url
Route::any('urlname',['as'=>'urltest','uses'=>'StudentController@urlTest',]);
//表单请求
Route::any('request1',['uses'=>'StudentController@request1',]);
// 表单session
// Route::group(['middleware'=>['web']],function(){
// 	Route::any('session1',['uses'=>'StudentController@session1']);
// 	Route::any('session2',['as'=>'sec2','uses'=>'StudentController@session2']);
// });
// 当Session::flash()失效时打开这两行，关闭上面4行
//Route::any('session1',['uses'=>'StudentController@session1']);
//Route::any('session2',['uses'=>'StudentController@session2']);
Route::any('response1',['uses'=>'StudentController@response1']);
// middleware 活动宣传页
Route::any('activity0',['uses'=>'StudentController@activity0']);
// 活动页面
Route::group(['middleware'=>['activity']],function(){
	Route::any('activity1',['uses'=>'StudentController@activity1']);
    Route::any('activity2',['uses'=>'StudentController@activity2']);
});
	// 表单实例 展示学生信息
	Route::any('student/index',['uses'=>'StudentController@index']);
	// 表单实例 展示学生信息
	Route::any('student/create',['uses'=>'StudentController@create']);
	// 表单实例 保存新增数据后台
	Route::any('student/save',['uses'=>'StudentController@save']);
	// 表单修改
	Route::any('student/update/{id}',['uses'=>'StudentController@update']);
	// 表单详情
	Route::any('student/detail/{id}',['uses'=>'StudentController@detail']);
		// 表单删除
	Route::any('student/delete/{id}',['uses'=>'StudentController@delete']);