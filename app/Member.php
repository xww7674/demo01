<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Member extends Model{
	public static function getMember(){
		return 'this is a Member模型层!';
	} 
}