@extends('common.layouts')
@section('content')
@include('common.validator')
            <div class="panel panel-default">
              

                 <div class="panel-heading">通过Create新增学生</div>
                <div class="panel-body">
                   @include('student.form')
                </div>
            </div>
        @stop