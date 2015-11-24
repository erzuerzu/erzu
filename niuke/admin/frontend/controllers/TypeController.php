<?php

namespace frontend\controllers;
header("content-type:text/html;charset=utf8");
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\mongodb\Query;
class TypeController extends Controller{
    public $enableCsrfValidation = false;
    //分类列表
    public function actionType_list(){
        $query=new Query();
        $query->select(['type_name'])->from('type')->where(['p_id'=>'0']);
        $data['rows'] = $query->all();
        return $this->renderPartial("list",$data);
    }
    //分类添加页面
    public function actionAdd(){
        $query=new Query();
        $query->select(['type_name'])->from('type')->where(['p_id'=>'0']);
        $data['rows'] = $query->all();
        return $this->renderPartial("add",$data);
    }
    
    //分类添加入库
    public function actionDoadd(){
       $name=$_POST['type_name'];
       $level=$_POST['level'];
       $p_id=$_POST['p_id'];
       $collection = Yii::$app->mongodb->getCollection('type');
       $res = $collection->insert(['type_name' => $name, 'level' => $level,'p_id'=>$p_id]);
       if($res){
           echo "<script>alert('添加成功');location.href='index.php?r=type/type_list';</script>";
       }else{
           echo "<script>alert('添加失败');location.href='index.php?r=type/add';</script>";
       }
    }
    //父级分类下的子集分类
    public function actionNext(){
        $id=$_GET['id'];
        $query=new Query();
        $query->select(['type_name'])->from('type')->where(['p_id'=>$id]);
        $data['rows'] = $query->all();
        return $this->renderPartial("next_list",$data);
    }
    //删除分类
    public function actionDel(){
        $id=$_GET['id'];
        $collection = Yii::$app->mongodb->getCollection('type');
        $res = $collection->remove(['_id'=>$id]);
        if($res){
            echo "<script>alert('删除成功');location.href='index.php?r=type/type_list';</script>";
        }else{
            echo "<script>alert('删除失败~~');location.href='index.php?r=type/type_list';</script>";
        }
    }
    //修改分类页面
    public function actionEdit(){
        $id=$_GET['id'];
        $query=new Query();
        $query->select(['type_name','level','p_id'])->from('type')->where(['_id'=>$id]);
        $data['rows'] = $query->one();
        $query->select(['type_name','level','p_id'])->from('type')->where(['p_id'=>'0']);
        $data['arr']=$query->all();
        return $this->renderPartial("edit",$data);
    }
    //修改分类
    public function actionDoedit(){
        $id=$_POST['id'];
        $name=$_POST['type_name'];
        $level=$_POST['level'];
        $p_id=$_POST['p_id'];
        $collection = Yii::$app->mongodb->getCollection('type');
        $res = $collection->update(['_id'=>$id],['type_name' => $name, 'level' => $level,'p_id'=>$p_id]);
        if($res){
           echo "<script>alert('修改成功');location.href='index.php?r=type/type_list';</script>";
        }else{
           echo "<script>alert('修改失败');location.href='index.php?r=type/type_list';</script>";
        }
    }
}
