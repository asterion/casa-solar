<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class CallForApplicationCommuneFixture extends ActiveFixture
{
    public $modelClass = 'app\models\CallForApplicationCommune';
    public $depends = ['tests\unit\fixtures\CommuneFixture', 'tests\unit\fixtures\CallForApplicationStageFixture'];
}
