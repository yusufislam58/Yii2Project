<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Childrens $model */

$this->title = 'Create Childrens';
$this->params['breadcrumbs'][] = ['label' => 'Childrens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="childrens-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
