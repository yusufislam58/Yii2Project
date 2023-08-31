<?php

use backend\modules\api\models\Mom;
use frontend\models\Moms;
use frontend\models\Childrens;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use sjaakp\collapse\Collapse;
use sjaakp\collapse\Accordion;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider*/
/** @var yii\data\ActiveDataProvider $dataProvider2*/
/** @var yii\data\ActiveDataProvider $childrenDataProvider*/
/** @var frontend\models\MomSearchModel $searchModel */
/** @var frontend\models\MomGeneralSearchModel $generalSearchModel */
/** @var frontend\models\ChildrensSearhModel $searhModelChildren */
/** @var yii\widgets\ActiveForm $form */


$this->title = 'Moms';
$this->params['breadcrumbs'][] = $this->title;


Yii::$app->session->set('a', 0);
$models= new Moms();


?>
<html>
<link rel="stylesheet" href="../../web/css/moms.css" >
<?php Accordion::begin([
    'label' => '<i class="fa" aria-hidden="true"></i> Click the <span class="bold-colorful"> DETAİLS SEARCH </span>moms table ',
    'encode' => false,
    'open' => false,
]) ?>
<?php $form = ActiveForm::begin(['method' => 'POST']); ?>
<?= Html::csrfMetaTags() ?>
<div class="row">
    <div class="col-sm-3">
        <?= $form->field($searchModel, 'name')->textInput(['class' => 'form-control']) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($searchModel, 'surname')->textInput(['class' => 'form-control']) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($searchModel, 'id')->textInput(['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">

    <div class="col-md-3">
        <?= $form->field($searchModel, 'chilsdId')->textInput(['class' => 'form-control']) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($searchModel, 'child_name')->textInput(['class' => 'form-control']) ?>
    </div>
</div>

<div class="row">

</div>

<div class="row">
    <div class="col-md-12">
        <?= Html::submitButton('Detail Search', ['class' => 'btn btn-primary', 'name' => 'searchButton', 'value' => 'detail']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
</html>

<?= Html::csrfMetaTags() ?>


<?php Accordion::next([

    'label' => '<i class="fa" aria-hidden="true"></i>  Click the <span class="bold-colorful">GENERAL SEARCH</span> moms table',
    'encode' => false,
    'toggleOptions' => [ '<i class="fas fa-lock"></i>' ],
    'open'=>false,

]) ?>
        <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
<?= Html::csrfMetaTags() ?>
            <div class="col-sm-3">
                <?= $form->field($generalSearchModel, 'generalSearch')->textInput(['class' => 'form-control']) ?>
                <?= Html::submitButton('General Search', ['class' => 'collapse', 'name' => 'searchButton', 'value' => 'general']) ?>
            </div>
        <?php ActiveForm::end(); ?>
<?php Accordion::end();?>
<div class="moms-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Moms', ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?=
    GridView::widget([



        'dataProvider' => $dataProvider,

        //'filterModel'=>$searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'childrensNames',
            'childrensId',
            'childsCount',
            [
                'attribute' => 'file',
                'format' => 'raw', // HTML formatında göstermek için
                'value' => function ($model) {
                    return "<a href='/gelenDosya/{$model->fileName}' download='{$model->fileName}'>{$model->fileName}</a>";

                },
            ],
            [
                'attribute' => 'srcaa',
                'format' => 'raw',
                'contentOptions' => ['class' => 'src-red'],
                'value' => function ($model) {
                        $imageName=$model->fileName;
                        $imagePath= '/gelenDosya/'.$imageName;
                        $uzanti = pathinfo($imageName, PATHINFO_EXTENSION);
                        if (!in_array($uzanti, ['png', 'jpg', 'jpeg', 'gif'])) {
                           return 'Resim bulunamadı!!';
                        }else
                        {
                            return '<div class="dropdown">
                                <img src="'.$imagePath.'" alt="'.$imageName.'" width="100" height="50">
                                <div class="dropdown-content">
                                    <img src="'.$imagePath.'" alt="'.$imageName.'"width="300" height="200">
                                    <div class="desc">'.$imageName.'</div>
                                </div>
                            </div>';
                        }

                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Moms $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
</div>