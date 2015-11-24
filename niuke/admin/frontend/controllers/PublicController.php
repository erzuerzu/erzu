<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\mongodb\Query;
class PublicController extends Controller{
    public $enableCsrfValidation = false;
    
    public function actionLogin(){
       // print_r($session);
        return $this->render('login');
        
    }
    public function actionCheck_login(){
        $username=$_POST['username'];
        $pwd=$_POST['pwd'];
        $query = new Query;
        $query->select(['name', 'status','password'])->from('admin')->where(['name'=>$username]);
        $arr=$query->one();
        if($arr){
            if($arr['password']==  md5($pwd)){
                $_SESSION['user_id']=$arr['_id'];
                $_SESSION['user_name']=$arr['name'];
                if($arr['name']!="admin"){
                    $userid = $arr['_id'];
                    //根据用户id查找用户的角色ID
                    $query->select(['role_id'])->from('user_role')->where(['user_id'=>"$userid"]);
                    $res = $query->one();
                    $role_id = $res['role_id'];
                    //根据角色ID查询所有权限ID,将其ID存入字符串中
                    $q = new Query;
                    $q->select(['node_id'])->from('role_node')->where(['role_id'=>$role_id]);
                    $ar = $q->all();

                    $que =  new Query;
                    foreach($ar as $key=>$v){
                       // $node[$key] = $v['node_id'];
                         $idd = $v['node_id'];
                         $que->select(['n_name','nickname','n_level','p_id'])->from('node')->where(['_id'=>"$idd"])->andwhere(['n_level'=>"1"]);
                         $quan[$key] = $que->all();
                    }
                    $yi_quan = array_filter($quan);
                    
                   $_SESSION['yi_quan']=$yi_quan;
                  $quee =  new Query;
                    foreach($ar as $kk=>$vv){
                       // $node[$key] = $v['node_id'];
                         $iddd = $vv['node_id'];
                         $quee->select(['n_name','nickname','n_level','p_id'])->from('node')->where(['_id'=>"$iddd"])->andwhere(['n_level'=>"2"]);
                         $quanx[$kk] = $quee->all();
                    }
                    $er_quan = array_filter($quanx);

                    $_SESSION['er_quan']=$er_quan;
                
                }else{
                     $que =  new Query;
                     $que->select(['n_name','nickname','n_level','p_id'])->from('node')->where(['n_level'=>"1"]);
                     $yi_quan = $que->all();
                    
                     $_SESSION['yi_q']=$yi_quan;
                     $quee =  new Query;
                     $quee->select(['n_name','nickname','n_level','p_id'])->from('node')->where(['n_level'=>"2"]);
                     $er_quan = $quee->all();
                     $_SESSION['er_q']=$er_quan;
                }
                echo "<script>location.href='index.php?r=site/index'</script>";
            }else{
                echo "<script>alert('密码错误');location.href='index.php?r=public/login'</script>";
            }
        }else{
            echo "<script>alert('用户名或密码错误');location.href='index.php?r=public/login'</script>";
        }
    }
  
}