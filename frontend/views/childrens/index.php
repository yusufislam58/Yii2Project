<?php

use frontend\models\Childrens;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var frontend\models\ChildrensSearhModel $searchModel */
/** @var yii\widgets\ActiveForm $form */



$this->title = 'Childrens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="childrens-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['method'=>'post']); ?>
    <?= $form->field($searchModel, 'name') ?>
    <?= $form->field($searchModel, 'surname') ?>
    <?= $form->field($searchModel, 'momsID') ?>
    <?= $form->field($searchModel, 'id') ?>
    <h1></h1>
    <?= html::submitButton('Search',['class'=>'btn btn-primary'])?>

    <?php ActiveForm::end(); ?>
    <p>
        <?= Html::a('Create Childrens', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'momsID',
            [
                'label'=>'Anne',
                'value'=> function($model){
                    $momNames =$model->moms ? $model->moms->name.' '.$model->surname:null;
                    return $momNames;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Childrens $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],

        ],
    ]); ?>


</div>
