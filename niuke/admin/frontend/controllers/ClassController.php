<?php
//header("content-type:text/html;charset=utf-8");
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\mongodb\Query;

class ClassController extends Controller
{
     public $enableCsrfValidation = false;
    //跳转到精品课堂管理页面
    public function actionIndex()
    {
     $query = new Query;
     $query->select(['cha_name','cha_introduce','update_time'])
         ->from('goods_class');
     $rows = $query->all();
        return $this->renderPartial('index',compact('rows'));
    }
    //添加列表展示
    public function actionAdd(){
        return $this->renderPartial("add");
    }
    //接收课堂数据并入库
    public function actionDatadd(){
        $cha_name = $_POST['cla_name'];
        $uid = $_SESSION['user_id'];
        $cha_introduce  = $_POST['cha'];
        $teacher = $_POST['teacher'];
        $time = date('Y-m-d H:i:s');
        $collection = Yii::$app->mongodb->getCollection('goods_class');
        $res = $collection->insert(['cha_name' => $cha_name, 'cha_introduce' => $cha_introduce,'teacher'=>$teacher,'update_time' => $time,'uid'=>$uid]);
        if($res){
            echo "<script>alert('添加成功');location.href='index.php?r=class/index';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='index.php?r=class/add';</script>";
        }
    }
    //精品课堂修改页面
    public function actionXiugai(){
        $id =  $_GET['id'];
        $query = new Query;
         $query->select(['cha_name','cha_introduce','update_time'])
         ->from('goods_class')->where(['_id'=>$id]);
        $rows = $query->one();
        return $this->renderPartial('save',compact('rows'));
    }
    //修改精品课堂
    public function actionSavedata(){
        $id =  $_POST['id'];
        $cha_name = $_POST['cla_name'];
        $cha_introduce = $_POST['cha'];
         $time = date('Y-m-d H:i:s');
        $collection = Yii::$app->mongodb->getCollection('goods_class');
        $res = $collection->update(['_id'=>$id],['cha_name' => $cha_name, 'cha_introduce' => $cha_introduce,'update_time' => $time]);
        if($res){
            echo "<script>alert('修改成功');location.href='index.php?r=class/index';</script>";
        }else{
            echo "<script>alert('修改失败');location.href='index.php?r=class/add';</script>";
        }
    }
    //删除精品课堂
    public function actionDelete(){
        $id =  $_GET['id'];
        $collection = Yii::$app->mongodb->getCollection('goods_class');
        $res = $collection->remove(['_id'=>$id]);
          if($res){
            echo "<script>alert('删除成功');location.href='index.php?r=class/index';</script>";
        }else{
            echo "<script>alert('删除失败~~');location.href='index.php?r=class/add';</script>";
        }
    }
    /*--------------------------------直播课程----------------------------------------*/
    //跳转到直播课堂管理页面
    public function actionZhibo()
    {
        $query = new Query;
        $query->select(['b_title','start_time','end_time','cla_exercise'])
         ->from('zhibo_class');
        $rows = $query->all();
         $que = new Query;
        $que->select(['z_name'])
         ->from('chapter_class');
        $data = $que->all();
        
        return $this->renderPartial('zhibo',["rows"=>$rows,"data"=>$data]);
    }
    //直播添加页面显示
    public function actionZhiboadd_list(){
        $uid = $_SESSION['user_id'];
        $query = new Query;
        $query->select(['z_name','practice_type'])
         ->from('chapter_class')->where(["uid"=>$uid]);
        $rows = $query->all();
        return $this->renderPartial('zhiboadd',  compact("rows"));
    }
    //直播添加入库
    public function actionZhibo_add(){
        $b_title = $_POST['b_title'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $cla_exercise = $_POST['cla_exercise'];
        $time = time();
        $collection = Yii::$app->mongodb->getCollection('zhibo_class');
        $res = $collection->insert(['b_title' => $b_title, 'start_time' => $start_time,'end_time'=>$end_time,'cla_exercise'=>$cla_exercise,'update_time' =>$time]);
        if($res){
             echo "<script>alert('添加成功');location.href='index.php?r=class/zhibo';</script>";
        }else{
             echo "<script>alert('添加失败~~');location.href='index.php?r=class/zhiboadd_list';</script>";
        }
    }
    //修改直播列表
    public function actionZhibo_save(){
        $id = $_GET["id"];
         $uid = $_SESSION['user_id'];
        $query = new Query;
        $query->select(['z_name','practice_type'])
         ->from('chapter_class')->where(["uid"=>$uid]);
        $rows = $query->all();
        
        $que = new Query;
        $que->select(['b_title','start_time','end_time','cla_exercise'])
         ->from('zhibo_class')->where(["_id"=>$id]);
        $data = $que->one();
        return $this->renderPartial("zhibo_savelist",["rows"=>$rows,"data"=>$data]);
    }
    //修改直播信息并入库
    public function actionZhiboadd(){
        $id = $_POST['id'];
        $b_title = $_POST['b_title'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $cla_exercise = $_POST['cla_exercise'];
        $time = time();
         $collection = Yii::$app->mongodb->getCollection('zhibo_class');
         $res = $collection->update(['_id'=>$id],['b_title' => $b_title,'start_time' => $start_time,'end_time'=>$end_time,'cla_exercise'=>$cla_exercise,'update_time' =>$time]);
         if($res){
             echo "<script>alert('修改成功');location.href='index.php?r=class/zhibo';</script>";
         }else{
             echo "<script>alert('修改失败~~');location.href='index.php?r=class/zhibo';</script>";
        }
    }
    //直播删除
    public function actionZhibo_delete(){
        $id = $_GET['id'];
        $collection = Yii::$app->mongodb->getCollection('zhibo_class');
        $res = $collection->remove(['_id'=>$id]);
          if($res){
            echo "<script>alert('删除成功');location.href='index.php?r=class/zhibo';</script>";
        }else{
            echo "<script>alert('删除失败~~');location.href='index.php?r=class/zhibo';</script>";
        }
        
    }
    /*---------------------------------章节开始----------------------------------------*/
    //课程章节列表
    public function actionSection(){
          $query = new Query;
         $query->select(['z_name','z_introduce','parent_id','practice_type','update_time'])
         ->from('chapter_class');
        $rows = $query->all();
        $que = new Query;
         $que->select(['_id','cha_name'])
         ->from('goods_class');
        $data = $que->all();
        return $this->renderPartial('section_list',["rows"=>$rows,"data"=>$data]);
    }
    //章节添加列表
    public function actionSec_add(){
         $query = new Query;
         $query->select(['cha_name','teacher'])
         ->from('goods_class');
        $rows = $query->all();
        return $this->renderPartial("sec_add",['data'=>$rows]);
    }
    //章节添加
    public function actionSecadd(){
        $uid = $_SESSION['user_id'];
        $z_name = $_POST['z_name'];
        $z_introduce  = $_POST['z_jieshao'];
        $parent_id = $_POST['z_pid'];
        $z_content = $_POST['z_content'];
        $practice_type = $_POST['z_type'];
        $update_time = time();
         $collection = Yii::$app->mongodb->getCollection('chapter_class');
         $res = $collection->insert(['z_name' => $z_name, 'z_introduce' => $z_introduce,'parent_id'=>$parent_id,'z_content'=>$z_content,'practice_type'=>$practice_type,'update_time' => $update_time,'uid'=>$uid]);
         if($res){
              echo "<script>alert('添加成功');location.href='index.php?r=class/section';</script>";
         }else{
            echo "<script>alert('添加失败~~');location.href='index.php?r=class/sec_add';</script>";
         }
    }
    //章节修改页面显示
    public function actionSec_save(){
        $id = $_GET['id'];
         $query = new Query;
         $query->select(['z_name','z_introduce','parent_id','z_content','practice_type'])
         ->from('chapter_class')->where(["_id"=>$id]);
         $rows = $query->one();
         $que = new Query;
         $que->select(['cha_name','lecturer'])
         ->from('goods_class');
        $data = $que->all();
         return $this->renderPartial("sec_save",['rows'=>$rows,'data'=>$data]);
    }
    //章节修改
    public function actionSec_saveadd(){
        $id = $_POST['id'];
        $z_name = $_POST['z_name'];
        $z_introduce  = $_POST['z_jieshao'];
        $parent_id = $_POST['z_pid'];
        $z_content = $_POST['z_content'];
        $practice_type = $_POST['z_type'];
        $update_time = time();
        $collection = Yii::$app->mongodb->getCollection('chapter_class');
        $res = $collection->update(['_id'=>$id],['z_name' => $z_name,'z_introduce' => $z_introduce,'parent_id'=>$parent_id,'z_content'=>$z_content,'practice_type'=>$practice_type,'update_time' => $update_time]);
        if($res){
            echo "<script>alert('修改成功');location.href='index.php?r=class/section';</script>";
        }else{
            echo "<script>alert('修改失败');location.href='index.php?r=class/section';</script>";
        }
    }
    //章节删除
    public function actionSec_delete(){
         $id = $_GET['id'];
         $collection = Yii::$app->mongodb->getCollection('chapter_class');
        $res = $collection->remove(['_id'=>$id]);
          if($res){
            echo "<script>alert('删除成功');location.href='index.php?r=class/section';</script>";
        }else{
            echo "<script>alert('删除失败~~');location.href='index.php?r=class/section';</script>";
        }
    }
}
