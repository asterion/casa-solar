<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class CallForApplicationFixture extends ActiveFixture
{
    public $modelClass = 'app\models\CallForApplication';
    public $depends = ['tests\unit\fixtures\ProgramFixture', 'tests\unit\fixtures\CallForApplicationStageFixture'];
}
