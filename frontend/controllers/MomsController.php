<?php

namespace frontend\controllers;

use backend\modules\api\models\Mom;
use frontend\models\Childrens;
use frontend\models\ChildrensSearhModel;
use frontend\models\MomGeneralSearchModel;
use frontend\models\Moms;
use frontend\models\MomSearchModel;
use Yii;
use yii\bootstrap4\Modal;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\debug\models\timeline\DataProvider;
use yii\debug\models\timeline\Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\momsDataProviderController;
use yii\web\ResponseFormatterInterface;
use yii\web\UploadedFile;

/**
 * MomsController implements the CRUD actions for Moms model.
 */
class MomsController extends Controller
{


    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Moms models.
     *
     * @return string
     */


    public function actionIndex()
    {


        $statusDataProvider = isset($_GET['statusDataProvider']) ? $_GET['statusDataProvider'] : 0;



        $searhModel =new MomSearchModel();
        $generalSearchModel = new MomGeneralSearchModel();
        $dataProvider= $searhModel->search(\Yii::$app->request->post());
//        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//            if (isset($_GET['searchButton']) && $_GET['searchButton'] === 'general') {
//                $dataProvider= $generalSearchModel->search(\Yii::$app->request->post());
//            } elseif (isset($_GET['searchButton']) && $_GET['searchButton'] === 'detail') {
//                $dataProvider= $searhModel->search(\Yii::$app->request->post());
//
//            } else {
//                $dataProvider= $searhModel->search(\Yii::$app->request->post());
//
//            }
//        }

        $model = new Moms();



        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searhModel,
            'generalSearchModel' => $generalSearchModel,
//            'searhModelChildren'=>$searhModelChildren,
//            'dataProviderChildren' => $dataProviderChildren,
        ]);

    }
//    private function showModal($header, $content)
//{
//    Modal::begin([
//        'title' => '<h2>' . $header . '</h2>', // 'title' özelliği kullanılıyor
//        'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>',
//    ]);
//
//    echo '<p>' . $content . '</p>';
//
//    Modal::end();
//    $this->getView()->registerJs('$("#modal").modal("show");');
//}
//    public function actionUpload()
//    {
//        $model = new Moms();
//
//        if (Yii::$app->request->isPost) {
//            $model->file = UploadedFile::getInstance($model, 'file');
//
//            if ($model->file) {
//                // Dosyanın yükleneceği hedef klasörü belirtin
//                $targetFolder = '/var/www/yiitest/frontend/web/gelenDosya';
//
//                // Dosya yolu ve adını oluşturun
//                $filePath = $targetFolder . '/' . $model->file->name;
//
//                // Dosyayı hedef klasöre kaydedin
//                if ($model->file->saveAs($filePath)) {
//                    // Formdan gelen id değerini alın
//                    $id = Yii::$app->request->post('Moms')['id'];
//
//                    // Veritabanından ilgili Moms modelini bulun
//                    $mom = Moms::findOne($id);
//
//                    // Yeni dosya yolunu belirleyin
//                    $newFilePath = '/gelenDosya/' . $model->file->name;
//
//                    // Moms modeline dosya yolu ve adını kaydedin
//                    $mom->file = $newFilePath;
//                    $mom->fileName = $model->file->name;
//
//                    // Moms modelini kaydedin
//                    if ($mom->save()) {
//
//                    } else {
//                        $errors = $mom->errors;
//                        return ['error' => 'Failed to save Moms model: ' . implode(', ', $errors)];
//                    }
//                } else {
//                    return ['error' => 'Failed to save uploaded file'];
//                }
//            } else {
//                return ['error' => 'No file uploaded'];
//            }
//        } else {
//            return ['error' => 'Invalid request'];
//        }
//
//
////        if (Yii::$app->request->isPost) {
////            $model->file = UploadedFile::getInstance($model, 'file');
////            if ($model->file && $model->validate()) {
////                $filePath = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
////                $model->file->saveAs($filePath);
////                $model->file_name = $model->file->name; // Dosya adını sakla
////                $model->id = 123; // Örnek bir id değeri
////                $model->save();
////                // Dosya yükleme işlemi ve id kaydetme işlemi başarılı
////            }
////        }
//    }



    /**
     * Displays a single Moms model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Moms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Moms();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {


                    $model->file = UploadedFile::getInstance($model, 'file');

                    var_dump($model->file);
                    if ($model->file) {
                        // Dosyanın yükleneceği hedef klasörü belirtin
                        $targetFolder = '/var/www/yiitest/frontend/web/gelenDosya';

                        // Dosya yolu ve adını oluşturun
                        $filePath = $targetFolder . '/' . $model->file->name;


                        // Dosyayı hedef klasöre kaydedin
                        if ($model->file->saveAs($filePath)) {
                            // Formdan gelen id değerini alın
//                            $id = Yii::$app->request->post('Moms')['id'];

                            // Veritabanından ilgili Moms modelini bulun
                            $mom = Moms::findOne($model->id);

                            // Yeni dosya yolunu belirleyin
                            $newFilePath = '/gelenDosya/' . $model->file->name;

                            // Moms modeline dosya yolu ve adını kaydedin
                            $mom->file = $newFilePath;
                            $mom->fileName = $model->file->name;

                            // Moms modelini kaydedin
                            if ($mom->save()) {

                            } else {
                                $errors = $mom->errors;
                            }
                        }
                    }

                return $this->redirect(['index', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Moms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $model = new Moms();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {


                    $model->file = UploadedFile::getInstance($model, 'file');

                    var_dump($model->file);
                    if ($model->file) {
                        // Dosyanın yükleneceği hedef klasörü belirtin
                        $targetFolder = '/var/www/yiitest/frontend/web/gelenDosya';

                        // Dosya yolu ve adını oluşturun
                        $filePath = $targetFolder . '/' . $model->file->name;


                        // Dosyayı hedef klasöre kaydedin
                        if ($model->file->saveAs($filePath)) {
                            // Formdan gelen id değerini alın
//                            $id = Yii::$app->request->post('Moms')['id'];

                            // Veritabanından ilgili Moms modelini bulun
                            $mom = Moms::findOne($id);

                            // Yeni dosya yolunu belirleyin
                            $newFilePath = '/gelenDosya/' . $model->file->name;

                            // Moms modeline dosya yolu ve adını kaydedin
                            $mom->file = $newFilePath;
                            $mom->fileName = $model->file->name;

                            // Moms modelini kaydedin
                            if ($mom->save()) {

                            } else {
                                $errors = $mom->errors;
                            }
                        }
                    }

                    return $this->redirect(['index', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();

            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Moms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //Childrens::deleteAll(['momsID' => $id]);
        $this->findModel($id)->delete();



        return $this->redirect(['index']);
    }

    /**
     * Finds the Moms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID

     * @return Moms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Moms::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
