@extends('layouts.app')

@section('content')
<div class="container">
<div class='panel-body'>
<table class="table">
   <caption>基本信息</caption>
      <tr>
         <th>名字</th>
         <td>{{$user->name}}</td>
         <th>邮箱</th>
         <td>{{$user->email}}</td>
      </tr>
      <tr>
         <th>电话</th>
         <td>{{$user->tel}}</td>
         <th>入学年份</th>
         <td>{{$user->admission_year}}</td>
      </tr>
</table>
    @if($user->active==false)
    请尽快验证邮箱
    @endif @if($user->status=='student')
<table class='table'>
<tr>
<th>班级</th>
<tr>{{$user->class}}</tr>
<th>小组</th>
<tr>{{$user->group}}</tr>
</tr>
</table>   
    @elseif($user->status=='graduate')
<table class='table'>
<tr>
<th>公司</th>
<td>{{$user->company}}</td>
</tr>
<tr>
<th>职务</th>
<td>{{$user->position}}</td>
</tr>
</table>
    @elseif($user->status=='delete')
    {{$user->status}}
    该用户已被删除
    @else
    没啥事
@endif



</div>
</div>
@endsection
