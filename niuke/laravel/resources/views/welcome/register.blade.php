@extends('app')
@section('content')
<link rel="stylesheet" href="../static.nowcoder.com/nowcoder/1.2.348/stylesheets/styles/reglogin/reglogin.css">
<script>
window.globalInfo = {};
</script>
<div class="nk-main clearfix">
<div class="wrapper">
<div class="tabbed">
<ul class="clearfix">
<li><a href="{{url('login')}}"><span class="tab-login"></span>登录</a></li>
<li class="tab-selected"><a href="javascript:void(0);"><span class="tab-reg"></span>注册</a></li>
</ul>
</div>
<div class="wrapper-content clearfix">
<div class="input-section">
{!! Form::open(['url'=>'/doregister']) !!}
    <div class="form-group">          
         <label for="emailIpt" class="control-label">电子邮箱</label>
         <div class="control-group">
         {!! Form::text('email', null, ['class' => 'form-control']) !!}
         </div>
        
    </div>
    <div class="form-group">          
         <label for="passwordIpt" class="control-label">密码</label>
         <div class="control-group">
         {!! Form::password('password', ['class' => 'form-control']) !!}
         </div>
    </div>
    <div class="form-group">          
         <label for="passwordIpt2" class="control-label">重输密码</label>
         <div class="control-group">
         {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
         </div>
    </div>
   <div class="form-group">          
         <label for="input-rqcode" class="control-label">输入验证码</label>
         <div class="control-group">
         {!! Form::text('captcha',null, ['class' => 'form-control']) !!}
        <a onclick="javascript:re_captcha();" class="rq-img"><img src="{{asset('/captcha/1')}}"  alt="验证码" title="刷新图片" width="100" height="25" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
        </a>
        <a href="javascript:void(0);" class="rq-refresh"></a>
         </div>
    </div>
    <div class="form-group">
        <div class="col-input-login">
            {!! Form::submit('立即注册',['class'=>'btn btn-primary btn-block']) !!}
        </div>
    </div>
{!! Form::close() !!}
@if($errors->any())
    <ul class='list-group'>
        @foreach($errors->all() as $error)
        <li class='list-group-item list-group-item-danger'>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>
    <script>  
    function re_captcha() {
        $url = "{{asset('/captcha')}}";
        $url = $url + "/" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
    }
</script>
<div class="other-login-way">
<span class="separate-line">或</span>
<div class="login-way">
<a href="javascript:void(0);" data-href="https://graph.qq.com/oauth2.0/authorize?client_id=101003590&response_type=code&redirect_uri=http://www.nowcoder.com/oauth2/qqconfig&state=web&scope=get_user_info" class="nc-js-action-oauth login-qq">QQ账号登录</a>
<a href="javascript:void(0);" data-href="https://api.weibo.com/oauth2/authorize?client_id=3023520088&response_type=code&redirect_uri=http://www.nowcoder.com/oauth2/sinaconfig&state=web&scope=follow_app_official_microblog" class="nc-js-action-oauth login-wb">微博账号登录</a>
<a href="javascript:void(0);" data-href="https://open.weixin.qq.com/connect/qrconnect?appid=wxfee0340998de6ab1&redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Flogin%2Fweixin?&response_type=code&scope=snsapi_login&state=11" class="nc-js-action-oauth login-wx">微信账号登录</a>
<a href="javascript:void(0);" data-href="https://graph.renren.com/oauth/authorize?client_id=33356a41ddac4028a9ad64925e68c0e0&response_type=code&redirect_uri=http://www.nowcoder.com/oauth2/rrconfig&state=web" class="nc-js-action-oauth login-rr">人人账号登录</a>
<a href="javascript:void(0);" data-href="https://github.com/login/oauth/authorize?client_id=1c539827b9400016d0c9&response_type=code&redirect_uri=http://www.nowcoder.com/oauth2/gitconfig&state=web&scope=user:email" class="nc-js-action-oauth login-git">Github账号登录</a>
</div>
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
<img src="{{asset('static.nowcoder.com/images/wx-rcode.jpg')}}" alt="二维码" />
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
@stop