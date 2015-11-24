<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\mongodb\Query;
class UserController extends Controller
{
    public $enableCsrfValidation = false;
    //跳转到用户管理页面
    public function actionUser_list()
    {
        
        $query = new Query;
        $res = $query->select(['email','status','addtime','name'])->from('admin')->all();
        return $this->renderPartial('index',compact('res'));
    }
     //添加用户列表展示
    public function actionAdd(){
         return $this->renderPartial("add");
    }
      //接收用户数据并入库
    public function actionDatadd(){
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $password = md5($_POST['user_password']);
        @$status = $_POST['user_status'];
        if(empty($status)){
            $status = '0';
        }
        $time = time();
        $collection = Yii::$app->mongodb->getCollection('admin');
        $res = $collection->insert(['name'=>$name,'email'=>$email, 'password' => $password,'status' => $status,'addtime' => $time]);
        if($res){
            echo "<script>alert('添加成功');location.href='index.php?r=user/user_list';</script>";
        }else{
            echo "<script>alert('添加失败~~');location.href='index.php?r=user/add';</script>";
        }
    }
     //用户修改页面
    public function actionXiugai(){
        $id =  $_GET['id'];
        $query = new Query;
         $query->select(['email','name','status'])
         ->from('admin')->where(['_id'=>$id]);
        $rows = $query->one();
        return $this->renderPartial('save',compact('rows'));
    }
    //修改用户数据
    public function actionSavedata(){
        $id = $_POST['id'];
        $user_name = $_POST['user_name'];
        $email = $_POST['user_email'];
        @$status = $_POST['user_status'];
        if(empty($status)){
            $status = '0';
        }
        $time = time();
        $collection = Yii::$app->mongodb->getCollection('admin');
        $res = $collection->update(['_id'=>$id],['name' => $user_name, 'email' => $email,'addtime' => $time,'status'=>$status]);
        if($res){
            echo "<script>alert('修改成功');location.href='index.php?r=user/user_list';</script>";
        }else{
            echo "<script>alert('修改失败~~');location.href='index.php?r=user/add';</script>";
        }
    }
    //删除用户信息
    public function actionDelete(){
        $id =  $_GET['id'];
         $collection = Yii::$app->mongodb->getCollection('admin');
         $res = $collection->remove(['_id'=>$id]);
          if($res){
            echo "<script>alert('删除成功');location.href='index.php?r=user/user_list';</script>";
        }else{
            echo "<script>alert('删除失败~~');location.href='index.php?r=user/add';</script>";
        }
    }
    //用户分配角色页面
    public function actionFen_role(){
        $user = $_GET['id'];
        $query = new Query;
         $query->select(['r_name'])
         ->from('role')->where(['r_status'=>1,'r_status'=>'1']);
        $rows = $query->all();
        return $this->renderPartial('fen_role',['user'=>$user,'rows'=>$rows]);
    }
    //用户分角色
    public function actionAdd_role(){
        @$jiaose_id = $_POST['jiaose'];
        $user_id = $_POST['user_id'];
        //$jiaose = implode(',',$jiaose_id);
         $collection = Yii::$app->mongodb->getCollection('user_role');
        for($i=0;$i<count($jiaose_id);$i++){
            $res = $collection->insert(['role_id'=>$jiaose_id[$i],'user_id'=>$user_id]);
        }
        if($res){
            echo "<script>alert('分配成功');location.href='index.php?r=user/user_list';</script>";
        }else{
            echo "<script>alert('分配失败~~');location.href='index.php?r=user/add';</script>";
        }
    }
}
