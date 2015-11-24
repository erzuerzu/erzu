<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaolunController extends Controller
{
      //讨论区页面
    public function discuss(){
        return view('taolun.discuss');
    }
}

