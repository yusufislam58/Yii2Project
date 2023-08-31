<?php

namespace backend\modules\api\controllers;

use common\models\User;
use yii\web\Controller;
use yii\web\Response;

class UserrController extends Controller
{


    public function actionListUser(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $user = User::find()->all();

        return array('status'=> true,'data'=>$user);
    }

}