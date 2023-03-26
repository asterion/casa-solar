<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Programas';

$offset = ceil(count($programs)/5);
$programs = array_chunk($programs, $offset);
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Postula al programa que desees.</h1>
        <p class="lead">@mmatamala</p>
    </div>

    <div class="body-content">
        <?php foreach ($programs as $slice): ?>
          <div class="row">
            <?php foreach ($slice as $program): ?>
              <div class="col-12 col-lg-4">
                <div class="card mb-2<?= ($program['active'] == 0 ? ' text-bg-secondary' : '') ?>">
                    <div class="card-header"><?= $program['name'] ?></div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><?= $program['description'] ?></p>
                        <?php if ($program['active'] == 0): ?>
                            <p>Cupos completados.</p>
                        <?php else: ?>
                            <a href="<?= Url::toRoute(['site/register', 'call_for_application_id' => $program['id']]) ?>" class="btn btn-primary">
                                Postular
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer <?= ($program['active'] == 0) ? 'text-white' : 'text-muted'?>">
                        <?php if ($program['active'] == 0): ?>
                            Postulaciones finalizadas.
                        <?php else: ?>
                            Cupos <?= $program['count_grant_application'] ?>/<?= $program['max_grant_application'] ?>
                        <?php endif; ?>
                    </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
    </div>
</div>
