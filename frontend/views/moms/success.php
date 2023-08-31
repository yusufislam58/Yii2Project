<?php
use yii\helpers\Html;

$this->title = 'Success';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="moms-success">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= $message = 'File uploaded and associated with Moms successfully';;
        $message ?></p>
</div>
