<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Postulaciones';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (count($applications) < 1): ?>

    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>postulante</th>
                    <th>comuna</th>
                    <th>programa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr>
                        <td><?= $application['email'] ?></td>
                        <td><?= $application['commune'] ?></td>
                        <td><?= $application['program'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
