<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Moms $model */

$this->title = 'Update Moms: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Moms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="moms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
