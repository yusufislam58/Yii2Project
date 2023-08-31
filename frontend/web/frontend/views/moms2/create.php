<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Moms2 $model */

$this->title = 'Create Moms2';
$this->params['breadcrumbs'][] = ['label' => 'Moms2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moms2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
