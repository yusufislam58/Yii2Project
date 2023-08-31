<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\LoginForm;
use common\models\User;
use yii\rest\Controller;
use yii\base\Model;
use yii\web\Response;

class SiteController extends Controller
{
    public function actionLogin(){
        $model = new LoginForm();
        if($model->load(\Yii::$app->request->post(),'')&& ($token=$model->login())){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $user = $model->username;
            return array(
                'token'=>$token,
                'username'=>$user,
            );
        }else {
            $model;
        }
    }
}