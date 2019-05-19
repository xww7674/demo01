<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class StudentController extends Controller{
	/**
	 * @Author    Hybrid
	 * @DateTime  2018-04-30
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [version]
	 * @return    [type]      [DB facade]
	 */
	public function test1(){
		$students=DB::select('select * from admin_inf');
		echo '<pre>';
		var_dump($students);
			echo '</pre>';
	}
	/**
	 * @Author    Hybrid
	 * @DateTime  2018-04-30
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [version]
	 * @return    [type]      [查询构造器 新增]
	 */
	public function query1(){
       // $bool=DB::table('exam_inf')->insert(['name'=>'imooc','Fid'=>18]);
        $id=DB::table('exam_inf')->insertGetId(['name'=>'imooc3','Fid'=>18]);
          var_dump($id);
	}
	//查询构造器  更新
	public function query2(){
		// $num=DB::table('exam_inf')->where('tid',12)->update(['name'=>'更新指定内容']);
		//所有tid自增
		$num=DB::table('exam_inf')->increment('Fid');
		var_dump($num);
	}
	/**
	 * @Author    Hybrid
	 * @DateTime  2018-04-30
	 * @copyright 
	 * @license   [license]
	 * @version   [version]
	 * @return    [type]      [查询构造器 删除数据]
	 */
	public function query3(){
		$num=DB::table('exam_inf')
		->where('Tid',2)
		->delete();
		var_dump($num);
	}
		/**
	 * @Author    Hybrid
	 * @DateTime  2018-04-30
	 * @copyright 
	 * @license   [license]
	 * @version   [version]
	 * @return    [type]      [查询构造器 查询数据查询指定字段并以Tid作为下标返回结果]
	 */
	public function query4(){
		$num=DB::table('exam_inf')
		->lists('name','Tid');
		var_dump($num);
	}
	//chunk 指定每次查询几条
	public function query5(){
		echo '<pre>';
		DB::table('exam_inf')->chunk(5,function($student){
			var_dump($student);
		});
	}
	// ORM 查询
	public function orm1(){
		// 查询所有表记录
		// $students=Student::all();
		// 查询指定记录
		// $students=Student::find('12 ');
		// dd($students);
		// 查询或返回报错
		// $student=Student::findOrFail('13');
		// dd($student);
		// 查询构造器在ORM 中的应用
		//1.get()
		// $student=Student::get();
		 // dd($student);
		 // var_dump($student);
		 //2. find()
		 // $student=Student::where('Tid','>=',5)->OrderBy('Fid','asc')->first();
	  //   dd($student);
	    // 3.查询构造器的聚合函数在ORM中应用
	   $num=Student::where('Fid','10')->count();
	   var_dump($num);
	   // 同理 max（）avg()min()sum()
	}
	// ORM 新增
	public function orm2(){
		// 1.使用模型新增数据
		// 新增时，会自动为表中的字段created_at 和updated_at 两个字段新增时间戳，如表中无这两个字段则报错，需在Model中加入	
		//  public $timestamps=false;
		// 关闭自动新增时间戳
		// $student=new Student();
		// $student->name='sean时间戳';
		// $student->Fid=21;
		// $bool=$student->save();
		// dd($bool);
		// $student=Student::find(15);
		// echo $student->created_at;
		// 取出时间戳，再转化成格式化时间
		// $time=Student::find(15);
		// echo date('Y-m-d H:i:s',$time->created_at);
		//2. 使用模型的Create方法新增字段,使用该方法时需在模型中设置允许批量赋值的字段
		// $fields=Student::create(
		// 	['name'=>'使用模型的Create方法新增字段','Fid'=>9]
		// );
		// var_dump($fields);
		// 3.查不到则新增 firstOrCreate()
		// $first=Student::firstOrCreate(
		// 	['name'=>'我爱学习慕课']
		// );
		// dd($first);
		// 4.查不到则建立新的指令 firstOrNew()
		$new=Student::firstOrNew(
			['name'=>'我爱学习慕课']
		);
		// dd($new);//此时还没插入数据库
	    $bool=$new->save();//插入数据库
	    dd($bool);
		
	}
	// ORM 修改
	public function orm3(){
// 1.通过模型
	    // $student=Student::find(10);
	    // $student->name='通过模型ORM 修改数据';
	    // $bool=$student->save();
	    // dd($bool);
	    // 2.通过结合查询语句
	    $num=Student::where('Tid','>',20)->update(['Fid'=>21]);
	    var_dump($num);

	}
	// ORM 删除
	public function orm4(){
		$delete=Student::find(22);
		$bool=$delete->delete();
		var_dump($bool);
	}
	public function section1(){
		// return view('student.section1');
		//等同于 return view('student/section1');
		//模板中输出PHP变量
	    $name='zhangsan';
	    $arr=['zhangsan','lisi'];
	    $examary=Student::all();
	    $nullary=[];
	    return view('student.section1',[
	    	'user'=>$name,
	    	'arr'=>$arr,
	    	'examary'=>$examary,
	    	'nullary'=>$nullary
	    ]);
	}
	public function urlTest(){
		return '测试的url地址';
	}
	// 表单请求request
	public function request1(Request $request){
		// 1.取值
		//echo $request->input('name');
		// echo $request->input('sex','zhangsan');
		// if($request->has('name')){
		// 	echo $request ->input('name');
		// }else{
		// 	echo '无参数';
		// }
		// $res=$request->all();
		// dd($res);
       // 2.判断请求类型
		// echo $request->method();
		// if($request->isMethod('POST')){
		// 	echo '是GET方式';
		// }else{
		// 	echo '不是GET方式';
		// }
		// $res=$request->ajax();
		// var_dump($res);
		// $res=$request->is('student/*');
		// var_dump($res);
		// 3。路径
		echo $request->url();
	}
	// session 存缓存
	public function session1(Request $request){
		// 1.HTTP request session();
		// $request->session()->put('key1','value1');
		// echo $request->session()->get('key1');
		// 2.session 辅助函数
         // session()->put('key2','value2');
        // echo session()->get('key2');
        // 3.Session例
         // Session::put('key3','value3');
         // 4.以数组的形式存入session
         // Session::put(['key4'=>'value4']);
         // 6.将数据存入session的数组中
         // Session::push('arr1','one');
         // Session::push('arr1','two');
         // 12.暂存数据
         Session::flash('code','val-flash');
	}
		// session 取缓存
	public function session2(Request $request){
       // echo Session::get('key3');
       // 5.session 不存在则取默认值
       // echo Session::get('key4','key4不存在');
       // $res= Session::get('arr1','数组不存在');
       // var_dump($res);
       // 7.pull 取完就删
       //   $res= Session::pull('arr1','数组不存在');
       // var_dump($res);	
       //8.取出所有session的值
       // $res=Session::all();
       // dd($res); 
       //9.判断某个key值是否存在
       // if(Session::has('key11')){
       // 	echo 'key11';
       // }else{
       // 	echo 'key11不存在';
       // }
       // echo Session::get('code');
       	//10.清除某个key
       // 	Session::forget('key3'); 
      
       // 11.清空所有session
       // Session::flush();
       //  	$res=Session::all();
       // dd($res); 
       // 接收response重定向的数据
       return Session::get('message','暂无信息');
	}
	// response 响应
	public function response1(){
       // $data=['error'=>10001,'msg'=>'success'];
       // 1.响应json
       // return response()->json($data);
       //2. 重定向
       // return redirect('urlname');
       // 3.重定向并带数据
          // return redirect('session2')->with('message','我是快闪数据');
          // 3.1使用action(控制器@方法)进行重定向
          // return redirect()->action('StudentController@session2')->with('message','我是快闪数据');
          // 3.2使用route(别名)进行重定向
          // return redirect()->route('sec2')->with('message','我是快闪数据');
          // 4.返回上一个页面
          return redirect()->back();
	}
	public function activity0(){
		return '活动还未开始，敬请期待！';
	}
	public function activity1(){
		return '活动已经开始，感谢您的参与1';
	}
	public function activity2(){
		return '活动已经开始，感谢您的互动2';
	}
	// 实例————表单 学生列表页
	public function index(){
		// $students=Student::get();
		// 分页 paginate(2)参数为每页显示的个数
		$students=Student::paginate(5);
		return view('student.index',[
			'students'=>$students
		]);
	}
	// 渲染新增页面

	// 通过Create 新增
		public function create(Request $request){
			$student=new Student();//new 一个模型
			if($request->isMethod('POST')){	
				// 1.控制器验证 数据校验
		// 	$this->validate($request,[
		// 		'Student.name'=>'required|min:2|max:5',
		// 		'Student.age'=>'required|integer',
		// 	    'Student.sex'=>'required|integer',
		//   ],['required'=>':attribute 为必填项',
		//   'min'=>':attribute 必须大于2位数',
		//   'max'=>':attribute 必须在5位数以内',
		//   'integer'=>':attribute 为整数',
		// ],['Student.name'=>'学生姓名',
		//    'Student.age'=>'学生年龄',
		//    'Student.sex'=>'性别',
		// ]
		// );
				// 2.Validator类验证
				$validator=\Validator::make($request->input(),[
				'Student.name'=>'required|min:2|max:5',
				'Student.age'=>'required|integer',
			    'Student.sex'=>'required|integer',
				  ],['required'=>':attribute 为必填项',
				  'min'=>':attribute 必须大于2位数',
				  'max'=>':attribute 必须在5位数以内',
				  'integer'=>':attribute 为整数',
				],['Student.name'=>'学生姓名',
				   'Student.age'=>'学生年龄',
				   'Student.sex'=>'性别',
				]);
				if($validator->fails()){
					return redirect()->back()->withErrors($validator)->withInput();
				}

				$data=$request->input('Student');
				if(Student::create($data)){//操作成功，并将成功信息存入闪存
					return redirect('student/index')->with('success','操作成功');
				}else{
					return redirect()->back()->with('fail','操作失败');
				}
			}
			 return view('student.create',['student'=>$student]);
			
	
	}
	// 保存新增数据后台————通过模型新增
	public function save(Request $request){
		$data=$request->input('Student');
		var_dump($data);
		$student=new Student();
		$student->name=$data['name'];
		$student->sex=$data['sex'];
		$student->age=$data['age'];
		if($student->save()){
			return redirect('student/index');
		}else{
			return redirect()->back();
		}

	}
	public function update(Request $request,$id){
		$student=Student::find($id);
		if($request->isMethod('POST')){
			$data=$request->input('Student');
			$student->name=$data['name'];
			$student->age=$data['age'];
			$student->sex=$data['sex'];
			if($student->save()){
				return redirect('student/index')->with('success','修改成功-'.$id);
			}
		}
		return view('student/update',['student'=>$student]);
	}
	public function detail($id){
		$student=Student::find($id);
        return view('student/detail',['student'=>$student]);
	} 
	public function delete($id){
			$student=Student::find($id);
			$bool=$student->delete();
			if($bool){
		        return redirect('student/index')->with('success','删除成功-'.$id);	
			}
        return redirect('student/index')->with('fail','删除失败-'.$id);	
	}

}