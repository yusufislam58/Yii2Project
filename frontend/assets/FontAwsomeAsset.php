<?php

namespace app\assets;

use yii\web\AssetBundle;

class FontAwsomeAsset extends AssetBundle
{
    public $sourcePath = '@app/../vendor/components/font-awesome'; // Font Awesome dosyalarının bulunduğu dizin

    public $css = [
        'css/font-awesome.css', // Font Awesome stilleri
    ];

    // Diğer gerekirse özellikler (örneğin js dosyaları) eklenebilir
}