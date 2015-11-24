<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users as User;
use Illuminate\Support\Facades\Request;
use Redirect;
use Session;
use Gregwar\Captcha\CaptchaBuilder;
class WelcomeController extends Controller
{
	//首页页面
    public function index(){
        return view("welcome/index");
    }
    
    public function mews() {
        return Captcha::create('welcome.index');
    }
    
	//登陆页面
    public function getlogin(){
	return view("welcome.login");
    }
    
    public function captcha($tmp)
    {
        ob_clean();
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        $builder->build(100,25);
        \Session::set('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
    }
    //注册页面
    public function getregister(){
        
        return view("welcome.register");
    }
    
    public function doregister(Requests\CreateUserRequest $request){
        $data=Request::all();
        $builder = new CaptchaBuilder;
        $captcha=Session::get('phrase');
        if($captcha==$data['captcha']) {
            //用户输入验证码正确
            $user = new User;//实例化User对象
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->save();
            return Redirect::to('/login');
        }else{
            //用户输入验证码错误
            return Redirect::to('/register');
        }
    }
    
    
    Public function dologin(){
        $data=Request::all();
        //return  $data['password'];
        $email=$data['email'];
        $users=User::where('email','=',$email)->get();
        if($users){
            $status['message']="登陆";
            $status['type']=1;
            Session::put('user',$users);
            Session::put('status',$status); 
            return redirect('/success');
        }else{
            $status['message']="登陆";
            $status['type']=0;
            Session::put('status',$status); 
            return redirect('/success');
            
        }
    }
    
    public function success(){
        $value = Session::get('status');
        return view('welcome.success',compact('value'));
    }
    
    public function outlogin(){
        Session::forget('user');
        return view('welcome.index');
    }
}


