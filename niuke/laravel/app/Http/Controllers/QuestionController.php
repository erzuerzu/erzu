<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\company as Company; //公司menu
use App\work_direction as Work_direction; //职业方向
use App\year as Year;   //时间
use App\test_paper as Test_paper;
use Cache;
header("content-type:text/html;charset=utf8");
class QuestionController extends Controller{

    public function index(){
        
        return view("questions.contestroom");
    }
    //题库页面
    public function contestroom(){
        //return 1;
        $data['company']=Company::get()->toArray();
        $data['work_direction']=Work_direction::get()->toArray();
        $data['year']=Year::get()->toArray();
        $data['paper']=Test_paper::get()->toArray();
        //print_r($data);die;
        return view("questions.contestroom",compact("data"));
    }

    //详细试题
    public function test_paper($tmp){

        $paper=Test_paper::where('_id',$tmp)->get()->toArray();
        Cache::put('paper',$paper);
        $value = Cache::get('paper');
        print_r($value);die;
        return view("questions.contestroom",compact("paper"));
    }


    //智能专项练习
    public function intelligenttest(){
        return view("questions.intelligenttest");
    }
    //在线编程
    public function oj(){
        return view("questions.oj"); 
    }
    //精华专题
    public function topics(){
        return view('questions.topics');
    }
    //试题广场
    public function questioncenter(){
        return view('questions.questioncenter');
    }

    //最新试题
    public function news(){
        return view('questions.contestroom');
    }

    //最热试题
    public function hot(){
        return view('questions.contestroom');
    }
}
