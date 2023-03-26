<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Postulación Registrada';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?> al programa "<?= Html::encode($program->name) ?>"</h1>
    <p>
        Gracias por registrar tu postulación.
    </p>
    <p>
        Notificaremos el avance y aceptación de tu postulación al correo registrado.
    </p>
</div>
