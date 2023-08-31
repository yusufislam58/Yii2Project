<?php

namespace frontend\tests\fixtures;

use frontend\models\Moms;
use yii\test\ActiveFixture;

class ChildrenFixtures extends ActiveFixture
{
    public $modelClass=Moms::class;
    public $depends = MomsFixtures::class;

}