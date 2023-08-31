<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Moms $model */

$this->title = 'Create Moms';
$this->params['breadcrumbs'][] = ['label' => 'Moms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="moms-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
