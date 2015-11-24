<?php
//header("content-type:text/html;charset=utf-8");
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

class QuestionController extends Controller{
    public $enableCsrfValidation = false;
    public function actionCompany(){
    	$query = new Query;
	    $query->select(['c_name','recommend','add_time'])
	         ->from('company');
	    $rows = $query->all();
	    //print_r($rows);
        return $this->renderPartial('company',compact('rows'));
    	//return $this->renderPartial("company");
    }

    public function actionCompany_add(){
    	return $this->renderPartial('company_add');
    }
    public function actionCompany_doadd(){
    	$request = Yii::$app->request;
    	//global $request;
    	$c_name=$request->post('c_name');
    	$recommend=$request->post('recommend');
    	$add_time=date("Y-m-d H:i:s",time());
    	$collection = Yii::$app->mongodb->getCollection('company');
 		$res=$collection->insert(['c_name' => $c_name, 'recommend' =>$recommend,'add_time'=>$add_time]);
 		if($res){
 			echo "<script>alert('添加成功');location.href='index.php?r=question/company'</script>";
 		}else{
 			echo "<script>alert('添加失败')</script>";
 		}
    }
    public function actionCompany_save(){
    	$request = Yii::$app->request;
		$id=$request->get('id');
		$query = new Query;
	    $query->select(['c_name','recommend','add_time'])->from('company')->where(['_id'=>$id]);       
	    $arr = $query->one();
	    //print_r($res);die;
		return $this->renderPartial('company_save',compact('arr'));
    }
    public function actionCompany_update(){
    	$request = Yii::$app->request;
    	$c_name=$request->post('c_name');
    	$recommend=$request->post('recommend');
    	$id=$request->post('id');
    	$collection = Yii::$app->mongodb->getCollection('company');
    	$res=$collection->update(['_id'=>$id],['c_name'=>$c_name,'recommend'=>$recommend]);
    	if($res){
 			echo "<script>alert('修改成功');location.href='index.php?r=question/company'</script>";
 		}else{
 			echo "<script>alert('修改失败')</script>";
 		}
    }
    public function actionCompany_delete(){
    	$request = Yii::$app->request;
		$id=$request->get('id');
		$collection = Yii::$app->mongodb->getCollection('company');
    	$res=$collection->remove(['_id'=>$id]);
    	if($res){
 			echo "<script>alert('删除成功');location.href='index.php?r=question/company'</script>";
 		}else{
 			echo "<script>alert('删除失败')</script>";
 		}
    }
    public function actionJob(){
    	$query = new Query;
	    $query->select(['j_name','add_time'])
	         ->from('work_direction');
	    $rows = $query->all();
	    return $this->renderPartial('job',compact('rows'));
    }
    public function actionJob_add(){
    	return $this->renderPartial('job_add');

    }
    public function actionJod_doadd(){
    	$request = Yii::$app->request;
    	$j_name=$request->post('j_name');
    	$add_time=date("Y-m-d H:i:s",time());
    	$collection = Yii::$app->mongodb->getCollection('work_direction');
 		$res=$collection->insert(['j_name' => $j_name,'add_time'=>$add_time]);
 		if($res){
 			echo "<script>alert('添加成功');location.href='index.php?r=question/job'</script>";
 		}else{
 			echo "<script>alert('添加失败');</script>";
 		}
    }
    public function actionJob_delete(){
    	$request = Yii::$app->request;
		$id=$request->get('id');
		//echo $id;die;
		$collection = Yii::$app->mongodb->getCollection('work_direction');
    	$res=$collection->remove(['_id'=>$id]);
    	if($res){
 			echo "<script>alert('删除成功');location.href='index.php?r=question/job'</script>";
 		}else{
 			echo "<script>alert('删除失败')</script>";
 		}
    }
    public function actionJob_save(){
    	$request = Yii::$app->request;
		$id=$request->get('id');
		$query = new Query;
	    $query->select(['j_name','add_time'])->from('work_direction')->where(['_id'=>$id]);       
	    $arr = $query->one();
	    //print_r($res);die;
		return $this->renderPartial('job_save',compact('arr'));
    }
    public function actionJob_update(){
    	$request = Yii::$app->request;
    	$j_name=$request->post('j_name');
    	$id=$request->post('id');
    	$collection = Yii::$app->mongodb->getCollection('work_direction');
    	$res=$collection->update(['_id'=>$id],['j_name'=>$j_name]);
    	if($res){
 			echo "<script>alert('修改成功');location.href='index.php?r=question/job'</script>";
 		}else{
 			echo "<script>alert('修改失败')</script>";
 		}
    }
    
}