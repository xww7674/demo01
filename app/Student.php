<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Student extends Model{
	// 数据库操作————Eloquent ORM 建立模型

	//指定表名
	protected $table='student';
	// 指定id
	protected $primaryKey='id';
	// 关闭自动新增时间戳
	// public $timestamps=false;
	// 开启自动新增时间戳
	public $timestamps=true;
	// 将时间格式化成时间戳（单位秒）
	protected function getDateFormat(){
		return time();
	}
	// 原样输出，取消系统将自动转化时间戳为格式化时间
	protected function asDateTime($val){
		return $val;
	}
	// 指定允许批量赋值的字段
	protected $fillable =['name','age','sex'];
	// 指定不允许批量赋值的字段
	// protected $guarded =['name','Fid'];
	// 
	const SEX_UN=10;
	const SEX_BOY=20;
	const SEX_GIRL=30;
	// 
	public function getsex($ind=null){
		$arr=[
			self::SEX_UN=>'未知',
			self::SEX_BOY=>'男',
			self::SEX_GIRL=>'女',
		];
		if($ind!==null){
			return array_key_exists($ind, $arr)?$arr[$ind]:$arr[self::SEX_UN];
		}
		return $arr;
	}
}