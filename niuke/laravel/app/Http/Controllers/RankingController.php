<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RankingController extends Controller
{
    //排行榜页面
    public function ranking(){
        return view('ranking.ranking');
    }
    
}
