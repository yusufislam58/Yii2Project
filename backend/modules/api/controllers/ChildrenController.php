<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Children;
use yii\rest\ActiveController;
use yii\web\UploadedFile;

class ChildrenController extends ActiveController
{

    public $modelClass = Children::class;


    public function actionUploadFile()
    {
        $file = UploadedFile::getInstanceByName('file');
        if ($file) {
            $targetFolder = '/opt/gelenDosya';

            if (!is_dir($targetFolder)) {
                mkdir($targetFolder, 775,true);
            }
            $filePath = $targetFolder . '/' . $file->name;

            $file->saveAs($filePath);

            // Dosyanın yoluyla ilgili işlemleri yapabilirsiniz (veritabanına ekleme vs.).
            // $filePath değişkeni veritabanına eklenecek dosyanın yolunu içerir.

            return ['message' => 'File uploaded successfully'];
        } else {
            return ['message' => 'No file uploaded'];
        }
    }
}
