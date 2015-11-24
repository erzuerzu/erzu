<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        //echo $session['user_id'];die;
        if(empty($_SESSION['user_id'])){
            echo "<script>location.href='index.php?r=public/login'</script>";
            exit();
        }
        
        return $this->renderPartial('index');
    }
    public function actionClear(){
       session_destroy();
       echo "<script>location.href='index.php?r=public/login'</script>";
    }
    
}