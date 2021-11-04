<?php

use yii\bootstrap4\Modal;

Modal::begin([
    'title'         => '',
    'headerOptions' => ['id' => 'modalHeaderSmall', 'style' => 'background:#eee'],
    'id'            => 'modal-universe-small',
    'closeButton'   => ['label' => '<i aria-hidden="true" class="ki ki-close"></i>'],
    'size'          => 'modal-sm',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContentSmall'><div style='text-align:center'><img src='" . Yii::getAlias('@web/img/loader.gif') . "'></div></div>";
Modal::end();

Modal::begin([
    'title'         => '',
    'headerOptions' => ['id' => 'modalHeader', 'style' => 'background:#eee'],
    'id'            => 'modal-universe',
    'closeButton'   => ['label' => '<i aria-hidden="true" class="ki ki-close"></i>'],
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'><div style='text-align:center'><img src='" . Yii::getAlias('@web/img/loader.gif') . "'></div></div>";
Modal::end();

Modal::begin([
    'title'         => '',
    'headerOptions' => ['id' => 'modalHeaderLarge', 'style' => 'background:#eee'],
    'id'            => 'modal-universe-large',
    'size'          => 'modal-lg',
    'closeButton'   => ['label' => '<i aria-hidden="true" class="ki ki-close"></i>'],
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContentLarge'><div style='text-align:center'><img src='" . Yii::getAlias('@web/img/loader.gif') . "'></div></div>";
Modal::end();

Modal::begin([
    'title'         => '',
    'headerOptions' => ['id' => 'modalHeaderXlarge', 'style' => 'background:#eee'],
    'id'            => 'modal-universe-xlarge',
    'size'          => 'modal-xl',
    'closeButton'   => ['label' => '<i aria-hidden="true" class="ki ki-close"></i>'],
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContentXlarge'><div style='text-align:center'><img src='" . Yii::getAlias('@web/img/loader.gif') . "'></div></div>";
Modal::end();

Modal::begin([
    'title'         => '',
    'headerOptions' => ['id' => 'modalHeaderFull', 'style' => 'background:#eee'],
    'id'            => 'modal-universe-full',
    'size'          => 'modal-full',
    'closeButton'   => ['label' => '<i aria-hidden="true" class="ki ki-close"></i>'],
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);

echo "<div id='modalContentFull'><div style='text-align:center'><img src='" . Yii::getAlias('@web/img/loader.gif') . "'></div></div>";
Modal::end();
