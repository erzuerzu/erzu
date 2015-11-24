
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');                                     //首页页面
Route::get('login', 'WelcomeController@getLogin');                              //登陆页面
Route::get('register', 'WelcomeController@getRegister');                        //注册页面
Route::post('dologin', 'WelcomeController@dologin');                            //登陆
Route::post('doregister', 'WelcomeController@doregister');                      //注册
Route::get('courses_1', 'KechengController@courses_1');                         //精品课程页面 
Route::get('live_courses', 'KechengController@live_courses');                   //直播课程页面 
Route::get('contestroom', 'QuestionController@contestroom');                    //题库页面
Route::get('intelligenttest', 'QuestionController@intelligenttest');            //题库页面
Route::get('oj', 'QuestionController@oj');                                      //题库页面
Route::get('topics', 'QuestionController@topics');                              //题库页面
Route::get('questioncenter', 'QuestionController@questioncenter');              //题库页面
Route::get('ranking', 'RankingController@Ranking');                             //排行榜页面
Route::get('discuss', 'TaolunController@discuss');                              //讨论页面
Route::get('success','WelcomeController@success');                              //成功失败页面
Route::get('outlogin','WelcomeController@outlogin');                            //成功失败页面
Route::get('captcha/{tmp}', 'WelcomeController@captcha');
Route::get('hot', 'QuestionController@hot');									//最热试题
Route::get('news', 'QuestionController@news');									//最新试题
Route::get('test_paper/{tmp}','QuestionController@test_paper');						//详细试题