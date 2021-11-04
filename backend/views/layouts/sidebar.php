<?php

use common\models\entity\Menu;
use yii\helpers\Url;

?>

<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="<?= Url::to(['/site/index']) ?>" class="brand-logo">
            <!-- <img alt="Logo" src="<?= Url::base() ?>/metronic/media/logos/logo-light.png" /> -->
            <big><span style="font-weight:bolder"><?= Yii::$app->params['brand'] ?></span></big>
        </a>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="margin-top:-25px;">
            <?php
            $menuItems = [];
            if (!Yii::$app->user->isGuest) {
                $menuItems = [
                    ['label' => 'Dasbor', 'icon' => 'fas fa-tachometer-alt', 'url' => ['/site/index']],
                    [
                        'label' => 'Pengaturan Web',
                        'icon' => 'fas flaticon2-gear',
                        'url' => '#',
                        'options' => ['class' => 'treeview'],
                        'items' => [
                            ['label' => 'Kontak', 'encode' => false, 'url' => ['/contact/index']],
                            ['label' => 'Profil', 'encode' => false, 'url' => ['/profil/view?id=1']],
                        ],
                    ],
                    ['label' => 'Pengaturan Menu', 'encode' => false, 'icon' => 'flaticon2-menu-3', 'url' => ['/menu/index']],

                    [
                        'label' => 'Manajemen Laman',
                        'icon' => 'fas la-pager',
                        'url' => '#',
                        'options' => ['class' => 'treeview'],
                        'items' => [
                            ['label' => 'Laman', 'encode' => false, 'icon' => 'file-o', 'url' => ['/pages/index']],
                            ['label' => 'Tambah Laman', 'encode' => false, 'icon' => 'plus', 'url' => ['/pages/create']],
                        ],
                    ],
                    [
                        'label' => 'Manajemen Artikel',
                        'icon' => 'fas la-newspaper',
                        'encode' => false,
                        'url' => '#',
                        'options' => ['class' => 'treeview'],
                        'items' => [
                            ['label' => 'Kategori', 'encode' => false, 'icon' => 'list', 'url' => ['/category/index']],
                            ['label' => 'Artike', 'encode' => false, 'icon' => 'newspaper-o', 'url' => ['/news/index']],
                            ['label' => 'Tambah Artikel', 'encode' => false, 'icon' => 'plus', 'url' => ['/news/create']],
                        ],
                    ],
                    [
                        'label' => 'Manajemen Banner',
                        'icon' => 'fas la-images',
                        'url' => '#',
                        'options' => ['class' => 'treeview'],
                        'items' => [
                            ['label' => 'Banner', 'encode' => false,  'url' => ['/banner/index']],
                        ],
                    ],
                    [
                        'label' => 'Manajemen User',
                        'icon' => 'fas la-user',
                        'url' => '#',
                        'options' => ['class' => 'treeview'],
                        'visible' => Yii::$app->user->can('Admin'),
                        'items' => [
                            ['label' => 'User', 'encode' => false, 'url' => ['/user/index']],
                            //['label' => 'Assignment',   'url' => ['/acf/assignment']],
                            //['label' => 'Role',         'url' => ['/acf/role']],
                            //['label' => 'Permission',   'url' => ['/acf/permission']],
                            //['label' => 'Route',        'url' => ['/acf/route']],
                            //['label' => 'Rule',         'url' => ['/acf/rule']],
                        ],
                    ],
                    ['label' => 'User', 'icon' => 'user', 'url' => ['/user/index'], 'visible' => Yii::$app->user->can('superuser')],
                    ['label' => 'Log', 'icon' => 'clock-o', 'url' => ['/log/index'], 'visible' => Yii::$app->user->can('superuser')],
                ];

                // $menuItems = mdm\admin\components\Helper::filter($menuItems);
            ?><br />
            <?php } else { ?>
                <?php
                $menuItems = [
                    ['label' => '<b>MENU</b>', 'encode' => false, 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Lupa Password', 'url' => ['site/request-password-reset'], 'visible' => Yii::$app->user->isGuest],
                ];
                ?>
            <?php } ?>

            <?= \common\widgets\Menu::widget(['items' => $menuItems]); ?>

            <!-- <ul class="sidebar-menu"><li><a href="<?= \yii\helpers\Url::to(['site/logout']) ?>" data-method="post"><i class="sign-out"></i>  <span>Logout</span></a></li></ul> -->
        </div>
    </div>
</div>