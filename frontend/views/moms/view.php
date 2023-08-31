<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Moms $model */
/** @var frontend\models\Childrens $modelC */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Moms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="moms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'surname',
            [
                'label' => 'Çocuklar',
                'value' => function ($model) {
                    $children = $model->childrens;
                    $childNames = [];
                    foreach ($children as $child) {
                        $childNames[] = $child->name. ' '.$child->surname ;
                    }
                    return implode(', ',$childNames);
                    },
            ],
        ],
    ]) ?>

</div>
