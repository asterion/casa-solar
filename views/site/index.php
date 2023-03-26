<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Programas';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Postula al programa que desees.</h1>
        <p class="lead">@mmatamala</p>
    </div>

    <div class="body-content">
        <?php if (count($programs) < 1): ?>
            <p class="text-muted">Aún no se han creado ningun programa.</p>
        <?php else: ?>
            <?php
                $offset = ceil(count($programs)/5);
                $programs = array_chunk($programs, $offset);
            ?>
            <?php foreach ($programs as $slice): ?>
              <div class="row">
                <?php foreach ($slice as $program): ?>
                  <div class="col-12 col-lg-4">
                    <div class="card mb-2<?= ($program['active'] == 0 ? ' text-bg-secondary' : '') ?>">
                        <div class="card-header"><?= $program['name'] ?></div>
                        <div class="card-body">
                            <h5 class="card-title text-end">
                                <span class="badge rounded-pill text-bg-dark">
                                    <?= $program['stage_name'] ?>
                                </span>
                            </h5>
                            <p class="card-text"><?= $program['description'] ?></p>
                            <p class="text-end">
                            <?php if ($program['active'] == 0): ?>
                                Cupos completados.
                            <?php else: ?>
                                <a href="<?= Url::toRoute(['site/register', 'call_for_application_id' => $program['id']]) ?>" class="btn btn-primary">
                                    Postular
                                </a>
                            <?php endif; ?>
                            </p>
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
        <?php endif; ?>
    </div>
</div>
