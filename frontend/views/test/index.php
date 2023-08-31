<?php

use yii\helpers\Html;

$this->title = 'Test Sayfa';
$this->params['breadcrumbs'][] = $this->title;


require 'main-local.php';

$deneme= DB::get("SELECT * FROM  moms");
print_r(deneme);
