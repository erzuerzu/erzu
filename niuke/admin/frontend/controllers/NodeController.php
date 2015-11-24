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

class NodeController extends Controller
{
     public $enableCsrfValidation = false;
    //跳转到权限管理页面
    public function actionNode_list()
    {
        $query = new Query;
        $query->select(['n_name','nickname','n_level','time'])
         ->from('node');
         $rows = $query->all();
        return $this->renderPartial('index',  compact('rows'));
    }
    
    
     //添加列表展示
    public function actionAdd(){
         return $this->renderPartial("add");
    }
     //接收权限数据并入库
    public function actionDatadd(){
        $n_name = $_POST['n_name'];
        @$pid = $_POST['p_id'];
        if(empty($pid)){
            $pid = 0;
        }
        $n_level = $_POST['n_level'];
        $nickname = $_POST['nickname'];
        $time = date('Y-m-d H:i:s');
        $collection = Yii::$app->mongodb->getCollection('node');
        $res = $collection->insert(['n_name'=>$n_name, 'nickname' => $nickname,'n_level' => $n_level,'p_id'=>$pid,'time' => $time]);
        if($res){
            echo "<script>alert('添加成功');location.href='index.php?r=node/node_list';</script>";
        }else{
            echo "<script>alert('添加失败~~');location.href='index.php?r=node/add';</script>";
        }
    }
     //权限修改页面
    public function actionXiugai(){
        $id =  $_GET['id'];
        $query = new Query;
         $query->select(['n_name','nickname','n_level'])
         ->from('node')->where(['_id'=>$id]);
        $rows = $query->one();
        return $this->renderPartial('save',compact('rows'));
    }
    
    //修改角色
    public function actionSavedata(){
        $id =  $_POST['id'];
        $n_name = $_POST['n_name'];
        $n_level = $_POST['n_level'];
        $nickname = $_POST['nickname'];
         $time = date('Y-m-d H:i:s');
        $collection = Yii::$app->mongodb->getCollection('node');
        $res = $collection->update(['_id'=>$id],['n_name' => $n_name,'nickname'=>$nickname, 'n_level' => $n_level,'time' => $time]);
        if($res){
            echo "<script>alert('修改成功');location.href='index.php?r=node/node_list';</script>";
        }else{
            echo "<script>alert('修改失败~~');location.href='index.php?r=node/add';</script>";
        }
    }
    //删除角色
    public function actionDelete(){
        $id =  $_GET['id'];
         $collection = Yii::$app->mongodb->getCollection('node');
         $res = $collection->remove(['_id'=>$id]);
          if($res){
            echo "<script>alert('删除成功');location.href='index.php?r=node/node_list';</script>";
        }else{
            echo "<script>alert('删除失败~~');location.href='index.php?r=node/add';</script>";
        }
    }
    //查询pid
    public function actionHuan(){
        $id = $_GET['id'];
        if($id==1){
            return 0;exit;//不查数据
        }
        $dd = $id-1;
        $query = new Query;
        $query->select(['nickname'])->from('node')->where(['n_level'=>"$dd"]);
        $rows =$query->all();
        //var_dump($rows);
        echo json_encode($rows);
    }
}
