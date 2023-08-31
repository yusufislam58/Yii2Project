<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Mom;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\UploadedFile;

class MomController extends ActiveController
{
    public $modelClass =Mom::class;


//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class'=> HttpBasicAuth::class,
//        ];
//        return $behaviors;
//    }

    public function actionUploadFile()
    {

        $file = UploadedFile::getInstanceByName('file');

        if ($file) {
            $targetFolder = '/var/www/yiitest/frontend/web/gelenDosya';


            $filePath = $targetFolder . '/' .$file->name;

            $file->saveAs($filePath);
            $id = Yii::$app->request->get('id');

            $mom = Mom::findOne($id);
            $newFilePath = '/var/www/yiitest/frontend/web/gelenDosya'.$file->name; // Yeni dosya yolunu burada belirtin
            $mom->file = $newFilePath;
            $mom->fileName=$file->name;
            $mom->save(); // Değişiklikleri kaydet
            if (!$mom->save()) {
                $errors = $mom->errors; // Hata mesajlarını al
                // Hataları işlemek veya bildirmek için gerekli adımları yapabilirsiniz
            }

            // Dosyanın yoluyla ilgili işlemleri yapabilirsiniz (veritabanına ekleme vs.).
            // $filePath değişkeni veritabanına eklenecek dosyanın yolunu içerir.

            return ['message' => 'File uploaded successfully'];
        } else {
            return ['message' => 'No file uploaded'];
        }
    }
}
