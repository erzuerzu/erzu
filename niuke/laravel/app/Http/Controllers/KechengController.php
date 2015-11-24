<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KechengController extends Controller
{
    //精品课程页面
    public function courses_1(){
        return view('kecheng.courses_1');
    }
 
    //直播课程页面
    public function live_courses(){
        return view('kecheng.live_courses');
    }
    
}
