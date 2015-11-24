
@extends('app')
@section('content')
<div class="nk-main clearfix">
    @if($value['type']==1)
        {{$value['message']}}成功<br/>
        还有<span id="time">5</span>秒跳回主页
    @elseif($value['type']==0)
        {{$value['message']}}失败<br/>
        还有<span id="time">5</span>秒跳回主页
    @endif
</div>
<script type="text/javascript">
var t = 5;
function countDown(){
var time = document.getElementById("time");
t--;
time.innerHTML=t; 
if (t<=0) {
location.href="http://www.laravel.com/";
clearInterval(inter);
};
}
var inter = setInterval("countDown()",1000);
window.onload=countDown;
</script> 
@stop