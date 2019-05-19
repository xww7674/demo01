@extends('layouts')
@section('header')
@parent
<br>模板中url
<!-- 模板中url -->
<a href="{{url('urlname')}}">通过路由名url()</a>
<a href="{{action('StudentController@urlTest')}}">通过控制器@方法名action()</a>
<a href="{{route('urltest')}}">通过别名route()</a>
@stop
@section('content')
我是新内容
<!-- 1.模板中输出变量 -->
<p>使用者{{$user}}</p>
<!-- 2.模板中调用PHP代码 -->
<p>时间戳{{time()}}</p>
<p>现在时间：{{date('Y-m-d H:i:s')}}</p>
<p>使用者是{{isset($user)?$user:'没有人'}}</p>
<p>使用者是{{$name or '没有人'}}</p>
<!-- 3.原样输出 -->
<p>原样输出：@{{$user}}</p>
<!-- 4.模板中的注释 -->
<!-- 看的到 -->
{{--看不到的注释--}}
{{--5.引入子视图 include--}}

@include('student.common1',['message'=>'给子视图的消息'])
@stop
@section('footer')
@parent
<br>流程控制
<!-- 1.if -->
@if($user=='zhangsan')
我是张三
@elseif($user=='wangwu')
我是王五
@else
我是谁？
@endif
<br>
<!-- 在if中使用PHP代码 -->
@if(in_array($user,$arr))
我在组里
@else
我不在组织里
@endif
<!-- unless 相当于if 的取反 -->
<br>unless
@unless($user=='zhangsan')
我不出现
@endunless
@unless($user!='zhangsan')
我出现
@endunless
<!-- for -->
@for($i=0;$i<4;$i++)
<p>{{$i}}</p>
@endfor
<!-- foreach -->
@foreach($examary as $ary)
<p>{{$ary->name}}</p>
@endforeach
<!-- forelse -->
@forelse($nullary as $ary)
<p>{{$ary->name}}</p>
@empty
null
@endforelse

@stop

