<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class GrantApplicationFixture extends ActiveFixture
{
    public $modelClass = 'app\models\GrantApplication';
    public $depends = ['tests\unit\fixtures\CallForApplicationFixture', 'tests\unit\fixtures\CommuneFixture'];
}
