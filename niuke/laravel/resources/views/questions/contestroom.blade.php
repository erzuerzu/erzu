@extends('questions')
@section('question')
<script>
window.globalInfo = {};
</script>
<div class="nk-main test-center-page clearfix">
<div class="mini-banner">
<a href="courses/1.htm"><img src="../static.nowcoder.com/images/courses/jp-course.png"></a>
</div>
<div class="test-center-bar">
<ul class="test-center-menu">
<li>
<div class="tcm-mod">
<div class="tcm-arrow"></div>
<h4 class="tcm-hd">职业方向</h4>
<div class="tcm-bd">
@foreach($data['work_direction'] as $work_direction)
@if($work_direction['type']=="1")
<a class="tcm-tag" data-id="639" href="javascript:void(0);">{{$work_direction['j_name']}}</a>
@endif
@endforeach
</div>
</div>
<div class="mod-sub-wrap">
<div class="tcm-sub-mod">
<h4 class="tcm-hd">职业方向</h4>
<div class="tcm-bd">
@foreach($data['work_direction'] as $work_direction)
<a class="tcm-tag" data-id="639" href="javascript:void(0);">{{$work_direction['j_name']}}</a>
@endforeach
</div>
</div>
</div>
</li>
<li>
<div class="tcm-mod">
<div class="tcm-arrow"></div>
<h4 class="tcm-hd">公司</h4>
<div class="tcm-bd">
@foreach($data['company'] as $company)
@if($company['recommend']=="1")
<a href="javascript:void(0);" class="tcm-tag" data-id="134">{{$company['c_name']}}</a>
@endif
@endforeach
</div>
</div>
<div class="mod-sub-wrap">
<div class="tcm-sub-mod">
<h4 class="tcm-hd">公司</h4>
<div class="tcm-bd">
@foreach($data['company'] as $company)
<a class="tcm-tag" data-id="235" href="javascript:void(0);">{{$company['c_name']}}</a>
@endforeach
</div>
</div>
</div>
</li>
<li>
<div class="tcm-mod">
<h4 class="tcm-hd">时间</h4>
<div  class="tcm-bd">
@foreach($data['year'] as $years)
<a class="tcm-tag" data-id="254" href="javascript:void(0);">{{$years['years']}}</a>
@endforeach
</div>
</div>
</li>
</ul>
</div>
<div class="nk-content">
<div class="module-box">
<div class="menu-box">
<ul class="menu clearfix">
<li class="selected"><a href="javascript:void(0);">最新</a></li>
<li><a href='contestroomorderbyhotvalue2filter0'>最热</a></li>
</ul>
</div>
<div class="module-body">
<ul class="content-item-box clearfix">
@foreach($data['paper'] as $paper)
<?php $id=$paper['_id']; ?>
<li>
<a href="{{'/test_paper/'.$id}}">
<div class="content-item-brief">
<h1>{{$paper['p_name']}}</h1>
<div class="web-logoimg">
@foreach($data['company'] as $company)
@if($paper['c_id']==$company['_id'])
<img src="{{$company['imgs']}}"/>
@endif
@endforeach
</div>
<div class="exam-foot">已有{{$paper['join_num']}}人参加</div>
<dl class="exam-info">
<dd><span class="link-	">共{{$paper['que_count']}}道题</span></dd>
<dd class="exam-btn"><span class="btn  btn-block btn-primary" >查看详情</span></dd>
</dl>
</div>
<div class="difficulty">
<span class="item-label">难度系数：</span>
<span title="难度系数" class="stars star-{{$paper['difficulty']}}"></span>
</div>
</a>
</li>
@endforeach
</ul>
<div class="pagination">
<ul data-total="12">
<li class="txt-pager disabled js-first-pager"><a data-page="1" href="javascript:void(0)">首页</a></li>
<li class="txt-pager disabled js-pre-pager"><a data-page="1" href="javascript:void(0)">上一页</a></li>
<li class="active js-1-pager"><a href="javascript:void(0)" data-page="1">1</a></li>
<li class="js-2-pager"><a href="paper/listfilter0orderbyhotvalue1page2" data-page="2">2</a></li>
<li class="js-3-pager"><a href="paper/listfilter0orderbyhotvalue1page3" data-page="3">3</a></li>
<li class="js-4-pager"><a href="paper/listfilter0orderbyhotvalue1page4" data-page="4">4</a></li>
<li class="js-5-pager"><a href="paper/listfilter0orderbyhotvalue1page5" data-page="5">5</a></li>
<li class="js-6-pager"><a href="paper/listfilter0orderbyhotvalue1page6" data-page="6">6</a></li>
<li class="js-7-pager"><a href="paper/listfilter0orderbyhotvalue1page7" data-page="7">7</a></li>
<li class="js-8-pager"><a href="paper/listfilter0orderbyhotvalue1page8" data-page="8">8</a></li>
<li class="txt-pager js-next-pager"><a data-page="2" href="paper/listfilter0orderbyhotvalue1page2">下一页</a></li>
<li class="txt-pager js-last-pager"><a data-page="12" href="paper/listfilter0orderbyhotvalue1page12">末页</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="fixed-menu">
<ul>
<li>
<a href="#top" class="gotop" title="回到顶部" id="gotop"></a>
</li>
<li>
<a class="fixed-wb" target="_blank" href="../www.weibo.com/nowcoder"></a>
</li>
<li>
<a href="tencent_3a/groupwpa/subcmdallparam7b2267726f757055696e223a313537353934373~1" class="qq" title="QQ"></a>
</li>
<li>
<a href="javascript:void(0);" class="wx"></a>
<div class="wx-qrcode">
<img src="../static.nowcoder.com/images/wx-rcode.jpg" alt="二维码" />
<p>扫描二维码，关注牛客网</p>
</div>
</li>
<li>
<a href="discuss/30" class="feedback" title="意见反馈"></a>
<a href="discuss/30" class="feedback-letter">意见反馈</a>
</li>
<li>
<a href="javascript:void(0);" class="qrcode"></a>
<div class="wx-qrcode">
<img src="../uploadfiles.nowcoder.com/app/android/app.png" alt="二维码" />
<p>下载牛客APP，随时随地刷题</p>
</div>
</li>
</ul>
<div class="phone-qrcode" style="display:none;">
<a href="javascript:void(0);" class="qrcode-close">x</a>
<img src="../uploadfiles.nowcoder.com/app/android/app.png" alt="二维码" style="width:70px;height:70px;" />
<p>扫一扫下载牛客APP</p>
</div>
</div>

<script src="../static.nowcoder.com/nowcoder/1.2.348/javascripts/sea.js" type="text/javascript"></script>
<script src="../static.nowcoder.com/nowcoder/1.2.348/javascripts/base.js"></script>
<script type="text/javascript">
seajs.use('nowcoder/1.2.348/javascripts/site/common/index');
seajs.use('nowcoder/1.2.348/javascripts/site/common/nav');
</script>
<span id='cnzz_stat_icon_1253353781' style="display:none;"></span>
<script type="text/javascript">
window.parameter = {
mutiTagIds: ''
};
seajs.use('nowcoder/1.2.348/javascripts/site/contest/paperList');
</script>
@stop