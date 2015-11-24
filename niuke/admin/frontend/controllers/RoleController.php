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
class RoleController extends Controller
{
     public $enableCsrfValidation = false;
    //跳转到角色管理页面
    public function actionRole_list()
    {
        $query = new Query;
        $query->select(['r_name','r_status','time'])
         ->from('role');
         $rows = $query->all();
        return $this->renderPartial('index',compact('rows'));
    }
    //添加列表展示
    public function actionAdd(){
         return $this->renderPartial("add");
    }
     //接收角色数据并入库
    public function actionDatadd(){
        $cha_name = $_POST['cla_name'];
        $status = $_POST['status'];
        if(empty($status)){
            $status = 0;
        }
        $time = date('Y-m-d H:i:s');
        $collection = Yii::$app->mongodb->getCollection('role');
        $res = $collection->insert(['r_name' => $cha_name, 'r_status' => $status,'time' => $time]);
        if($res){
            echo "<script>alert('添加成功');location.href='index.php?r=role/role_list';</script>";
        }else{
            echo "<script>alert('添加失败~~');location.href='index.php?r=role/add';</script>";
        }
    }
     //角色修改页面
    public function actionXiugai(){
        $id =  $_GET['id'];
        $query = new Query;
         $query->select(['r_name','r_status','time'])
         ->from('role')->where(['_id'=>$id]);
        $rows = $query->one();
        return $this->renderPartial('save',compact('rows'));
    }
    
    //修改角色
    public function actionSavedata(){
        $id =  $_POST['id'];
        $r_name = $_POST['r_name'];
        if(empty( $_POST['status'])){
            $status = 0;
        }else{
            $status = 1;
        }
       
         $time = date('Y-m-d H:i:s');
        $collection = Yii::$app->mongodb->getCollection('role');
        $res = $collection->update(['_id'=>$id],['r_name' => $r_name, 'r_status' => $status,'time' => $time]);
        if($res){
            echo "<script>alert('修改成功');location.href='index.php?r=role/role_list';</script>";
        }else{
            echo "<script>alert('修改失败~~');location.href='index.php?r=role/add';</script>";
        }
    }
    //删除角色
    public function actionDelete(){
        $id =  $_GET['id'];
         $collection = Yii::$app->mongodb->getCollection('role');
         $res = $collection->remove(['_id'=>$id]);
          if($res){
            echo "<script>alert('删除成功');location.href='index.php?r=role/role_list';</script>";
        }else{
            echo "<script>alert('删除失败~~');location.href='index.php?r=role/add';</script>";
        }
    }
    //给角色分配权限页面展示
    public function actionRole_node(){
         $role_id =  $_GET['id'];
          $query = new Query;
          //查询一集权限
         $query->select(['_id','nickname','n_level'])
         ->from('node')->where(['n_level'=>'1']);
        $rows = $query->all();
        //查询二集权限
         $query->select(['_id','nickname','n_level'])
         ->from('node')->where(['n_level'=>'2']);
        $res = $query->all();
         return $this->renderPartial('role_node',['role_id'=>$role_id,'yiji'=>$rows,'erji'=>$res]);
    }
     //角色分配权限
    public function actionFen_node(){
        @$role_id = $_POST['role_id'];
        $quanxian = $_POST['quanxian'];
        //$jiaose = implode(',',$jiaose_id);
         $collection = Yii::$app->mongodb->getCollection('user_role');
        for($i=0;$i<count($jiaose_id);$i++){
            $res = $collection->insert(['role_id'=>$jiaose_id[$i],'user_id'=>$user_id]);
        }
        if($res){
            echo "<script>alert('分配成功');location.href='index.php?r=user/role_list';</script>";
        }else{
            echo "<script>alert('分配失败~~');location.href='index.php?r=user/add';</script>";
        }
    }
    //根据父级ID查询子分类
    public function actionHuaner(){
       $pid =  $_GET['pid'];
       if($pid ==0){
           echo 0;exit;
       }
       
        $query = new Query;
        $query->select(['_id','nickname','n_level'])
         ->from('node')->where(['p_id'=>$pid]);
        $rows = $query->all();
        if(empty($rows)){
             echo 1;exit;
        }else{
        echo json_encode($rows);
        }
       // return $rows;
    }
    //给角色赋值权限
    public function actionAddrole_node(){
        $role_id = $_POST['role_id'];
        $quan_id = $_POST['quanxian'];
        $query = new Query;
        $query->select(['_id'])
         ->from('role_node')->where(['node_id'=>$quan_id]);
        $ar = $query->one();
         $collection = Yii::$app->mongodb->getCollection('role_node');
        if(empty($ar)){
            $res = $collection->insert(['role_id' => $role_id, 'node_id' => $quan_id,'pid' => 0,'level'=> 1]);
        }
        @$s_id = $_POST['s_id'];
        if(empty($s_id)){
             if($res){
                echo "<script>alert('权限分配成功');location.href='index.php?r=role/role_list';</script>";
             }else{
                echo "<script>alert('权限分配失败~~');location.href='index.php?r=role/add';</script>";
             }
        }else{
          $que = new Query;
           $que->select(['_id'])
            ->from('role_node')->where(['node_id'=>$s_id]);
            $arr = $que->one();
            if($arr){
                echo "<script>alert('二级权限已存在，请从新添加~~');location.href='index.php?r=role/role_list';</script>";
            }else{
                $data = $collection->insert(['role_id' => $role_id, 'node_id' => $s_id,'pid' => $quan_id,'level'=> 2]);
                if($data){
                echo "<script>alert('权限分配成功');location.href='index.php?r=role/role_list';</script>";
             }else{
                echo "<script>alert('权限分配失败~~');location.href='index.php?r=role/add';</script>";
             }
            }
        }
      
    }
}
