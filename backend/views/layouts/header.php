<?php

use yii\helpers\Url;

$label_role =  Yii::$app->user->identity->roles;
?>

<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <ul class="menu-nav">
                    <li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                        <a href="#" class="menu-link menu-toggle">
                            <span class="menu-text" style="margin-left:-15px;"><?= strtoupper($label_role) ?></span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--begin::Topbar-->
        <div class="topbar">
            <?php if (!Yii::$app->user->isGuest) { ?>
                <!--begin::User-->
                <div class="dropdown">
                    <!--begin::Toggle-->
                    <div class="topbar-item" data-toggle="dropdown" id="user-dropdown-00">
                        <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2">
                            <span class="text-dark-50 font-weight-bolder font-size-base d-md-inline mr-3">&nbsp;<?= Yii::$app->user->identity->username ?></span>
                            <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                <span class="symbol-label font-size-h5 font-weight-bold"><?= strtoupper(substr(Yii::$app->user->identity->username, 0, 1)) ?></span>
                            </span>
                        </div>
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Dropdown-->
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Nav-->
                        <ul class="navi navi-hover py-4">
                            <!--begin::Item-->
                            <li class="navi-item">
                                <a href="<?= Url::to(['/user/profile']) ?>" class="navi-link">
                                    <span class="symbol symbol-20 mr-3">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <span class="navi-text">Profil</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="navi-item">
                                <a href="<?= Url::to(['/site/logout']) ?>" class="navi-link" data-method="post">
                                    <span class="symbol symbol-20 mr-3">
                                        <i class="fa fa-sign-out-alt"></i>
                                    </span>
                                    <span class="navi-text">Keluar</span>
                                </a>
                            </li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Nav-->
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::User-->
            <?php } ?>
        </div>
        <!--end::Topbar-->
    </div>
</div>