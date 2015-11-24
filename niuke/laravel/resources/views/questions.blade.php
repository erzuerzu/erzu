<!DOCTYPE html><!-- saved from url=(0039)http://www.nowcoder.com/intelligentTest --><meta http-equiv="X-UA-Compatible" content="IE=Edge" />

<!-- html svn version:1995 -->



<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>智能专项练习_C++Java前端经典笔试面试题库_牛客网</title>
<meta name="description" content="牛客网是IT求职神器,提供C++、JAVA、前端各知识点笔试题库,能过能力鉴定模型智能推荐专项突击练习，在线进行百度阿里腾讯等互联网名企笔试面试模拟考试练习,和牛人一起讨论经典试题,全面提升你的编程能力">
<meta name="keywords" content="牛客网, C++笔试面试，Java笔试面试，前端笔试面试，计算机笔试,计算机面试, IT笔试,笔试题库,笔试练习,IT面试,在线编程,编程学习,牛客网">
<link rel="stylesheet" href="../static.nowcoder.com/nowcoder/1.2.348/stylesheets/nowcoder-ui.css">
<script>
var _czc = _czc || [];
_czc.push(["_setAccount", "1253353781"]);
</script>
</head>
<body>
<div class="nk-container    ">
<div class="nowcoder-header">
<div class="header-main clearfix">
<a class="nowcoder-logo" href="{{'/'}}" title="牛客网"></a>
<ul class="nowcoder-navbar">
<li class="active">
<a href="{{'/'}}" class="nav-home">首页</a>
</li>
<li>
<a href="{{'/contestroom'}}" class="nav-exam">题库</a>
<ul class="sub-nav">
<li><a href="{{'/contestroom'}}">公司真题</a></li>
<li><a href="{{'/intelligenttest'}}">专项练习</a></li>
<li><a href="{{'/oj'}}">在线编程</a></li>
<li><a href="{{'/topics'}}">精华专题</a></li>
<li><a href="{{'/questioncenter'}}">试题广场</a></li>
</ul>
</li>
<li>
<span class="ico-nav-new"></span>
<a href="{{'/courses_1'}}" class="nav-exam">课程</a>
<ul class="sub-nav">
<li><a href="{{'/courses_1'}}">精品课程</a></li>
<li><a href="{{'/live_courses'}}">直播课程</a></li>
</ul>
</li>
<li>
<a href="{{'/ranking'}}" class="nav-ranking">排行榜</a>
</li>
<li>
<a href="{{'/recommand'}}" class="nav-discuss">内推</a>
</li>
<li>
<a href="{{'/discuss'}}" class="nav-discuss">讨论区</a>
</li>
<li>
<a href="{{'/app'}}" class="nav-discuss" target="_blank">APP</a>
</li>
</ul>
<div class="nav-account">
<a href="{{url('login')}}" class="nav-account-login" id="nav-login">登录</a>/
<a href="{{url('register')}}" class="nav-account-reg" data-permalink="">注册</a>
</div>
<ul class="nowcoder-navbar nowcoder-other-nav">
<li class="nav-search">
<form method="get" action="/search">
<label class="nav-search-ico"></label>
<input class="nav-search-txt" name="query" type="text"
placeholder="输入关键字搜索"
>
<input type="hidden" name="type" value="paper"/>
<input type="submit" class="nk-invisible"/>
</form>
</li>
</ul>
</div>
</div>
<script>
window.globalInfo = {};
</script>
<div class="test-tab-wrap">
<div class="test-tab-cont clearfix">
<ul class="test-tab clearfix">
<li><a href="{{'/contestroom'}}">公司真题</a></li>
<li><a href="{{'/intelligenttest'}}">专项练习</a></li>
<li><a href="{{'/oj'}}">在线编程</a></li>
<li><a href="{{'/topics'}}">精华专题</a></li>
<li><a href="{{'/questioncenter'}}">试题广场</a></li>
</ul>
</div>
</div>
	@yield('question')
    <!--主体内容结束-->
<div class="ft-wrap">
<div class="ft-cont clearfix">
<div class="ft-main">
<ul class="ft-links">
<li><a href="html/aboutus.htm">关于我们</a></li>
<li><a href="html/joinus.htm">加入我们</a></li>
<li><a href="discuss/30" target="_blank">意见反馈</a></li>
<li><a href="html/services.htm">企业服务</a></li>
<li><a href="html/cooperation.htm">网站合作</a></li>
<li><a href="javascript:void(0);" class="nc-req-auth nc-req-active js-test-vm">模拟终端</a></li>
<li><a href="html/disclaimer.htm">免责声明</a></li>
<li><a href="html/links.htm">友情链接</a></li>
</ul>
<ul class="webrights">
<li><a href="default.htm">牛客网&copy;2015 All rights reserved</a></li>
<li><a href="default.htm">浙ICP备14000860号-2</a></li>
</ul>
</div>
<dl class="ft-web-info">
<dt class="ft-web-name">牛客网，最大IT笔试面试题库</dt>
<dd class="ft-info-item">QQ群：272820159</dd>
<dd class="ft-info-item">微 信：www_nowcoder_com
<a href="javascript:;" class="btn btn-primary btn-xs">关注
<div class="tooltip top">
<div class="tooltip-arrow"></div>
<div class="tooltip-inner"><img width="80" src="../static.nowcoder.com//images/wx-rcode.jpg" /></div>
</div>
</a>
</dd>
<dd class="ft-info-item">微 博：牛客网
<a href="../weibo.com/nowcoder" class="btn btn-primary btn-xs" target="_blank">关注
</a>
</dd>
</dl>
<div class="ft-app">
<div class="ft-qrcode-box">
<img width="128" src="../uploadfiles.nowcoder.com/app/app_download.png" />
</div>
<p>扫一扫，把题目装进口袋</p>
</div>
</div>
</div>

</div>
<script src="{{asset('/static.nowcoder.com/nowcoder/1.2.348/javascripts/sea.js')}}" type="text/javascript"></script>
<script src="{{asset('/static.nowcoder.com/nowcoder/1.2.348/javascripts/base.js')}}"></script>
<script type="text/javascript">
seajs.use({{asset('nowcoder/1.2.348/javascripts/site/common/index')}});
seajs.use({{asset('nowcoder/1.2.348/javascripts/site/common/nav')}});
</script>
<span id='cnzz_stat_icon_1253353781' style="display:none;"></span>

<script type="text/javascript">
(function (window, undefined) {
window.parameter = {
cTags: {
'139': 'baidulogo',
'138': 'qqlogo',
'171': 'xllogo',
'157': 'qhlogo',
'146': 'wrlogo',
'170': 'yllogo',
'147': 'xmlogo',
'170': 'mtlogo'
}
};
})(window);
</script>
<script type="text/javascript">
seajs.use({{asset('nowcoder/1.2.348/javascripts/site/home/unloginv2.js.htm')}});
</script>
</body>
</html>