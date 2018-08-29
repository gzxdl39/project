@extends('Admin.common.default') 
@section('content') 
<style type="text/css" media="screen">
  .text {
    font-family:"微软雅黑", "Dosis", sans-serif;
    font-size: 80px;
    text-align: center;
    font-weight: bold;
    line-height:200px;
    text-transform:uppercase;
  }
  .effect01{
    color: #666;
    text-shadow:
    0px 1px 0px #c0c0c0,
    0px 2px 0px #b0b0b0,
    0px 3px 0px #a0a0a0,
    0px 4px 0px #909090,
    0px 5px 10px rgba(0, 0, 0, 0.6);
  }
</style>
  <p class="text effect01">欢迎使用后台管理系统</p>
@endsection
