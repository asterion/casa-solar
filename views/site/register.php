<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Postulación';
?>
<div class="site-about">
    <div class="container">
        <div class="row">
            <h1><?= Html::encode($this->title) ?> a "<?= Html::encode($program->name) ?>"</h1>
            <p>
                <?= Html::encode($program->description) ?>
            </p>
            <div class="col-12 col-lg-4">
                <?php $form = ActiveForm::begin(['id' => 'register-form', 'options' => ['class' => 'form-horizontal'], ]) ?>
                <?= $form->field($model, 'email') ?>
                    <?php
                        echo $form->field($model, 'commune_id')->label('Comuna')->dropdownList($communes, ['prompt' => 'Seleccionar comuna']);
                    ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                    <div class="form-group mt-2">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>
