<?php

use common\models\entity\Banner;
use common\models\entity\Category;
use common\models\entity\Contact;
use common\models\entity\Log;
use common\models\entity\Menu;
use common\models\entity\User;
use common\models\entity\News;
use common\models\entity\Submenu;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title = 'PPID Politeknik Negeri Padang';
// $this->title = Yii::$app->name;
// Yii::$app->params['showTitle'] = false;
?>
<div class="alert alert-info text-right">
    Tanggal : <?= date('d M Y') ?>
</div>

<div class="row">
    <div class="col-12 card card-custom bg-gray-100 card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 bg-danger py-5">
            <h3 class="card-title font-weight-bolder text-white">User : <?= User::find()->count() ?></h3>
            <div class="card-toolbar">
                <div class="dropdown dropdown-inline">
                    <a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user fa-3x"></span></a>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body p-0 position-relative overflow-hidden">
            <!--begin::Chart-->
            <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px; min-height: 200px;">
                <div id="apexcharts5la3idhu" class="apexcharts-canvas apexcharts5la3idhu apexcharts-theme-light" style="width: 811px; height: 200px;"><svg id="SvgjsSvg1179" width="811" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                        <g id="SvgjsG1219" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                        <g id="SvgjsG1182" class="apexcharts-annotations"></g>
                    </svg>
                    <div class="apexcharts-legend" style="max-height: 100px;"></div>
                    <div class="apexcharts-tooltip apexcharts-theme-light">
                        <div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div>
                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: transparent;"></span>
                            <div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                        <div class="apexcharts-yaxistooltip-text"></div>
                    </div>
                </div>
            </div>
            <!--end::Chart-->
            <!--begin::Stats-->
            <div class="card-spacer mt-n25">
                <!--begin::Row-->
                <div class="row m-0">
                    <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                        <i class="la la-tint icon-3x" style="color:orange;"></i><br>
                        <a href="#" class="text-warning font-weight-bold font-size-h6">Berita : <?= News::find()->count() ?></a>
                    </div>
                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                        <i class="la la-bars icon-3x" style="color:blue;"></i><br />
                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Kategori : <?= Category::find()->count() ?></a>
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row m-0">
                    <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                        <i class="la la-cloud-upload icon-3x" style="color:red;"></i><br />
                        <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Publish : <?= News::find()->where(['status' => 1])->count() ?></a>
                    </div>
                    <div class="col bg-light-success px-6 py-8 rounded-xl">
                        <i class="la la-ban icon-3x" style="color:green;"></i><br />
                        <!--end::Svg Icon-->
                        </span>
                        <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Banned : <?= News::find()->where(['status' => 2])->count() ?> </a>
                    </div>
                </div>

                <div class="row mt-7">
                    <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                        <i class="la la-folder-open-o icon-3x" style="color:orange;"></i><br>
                        <a href="#" class="text-warning font-weight-bold font-size-h6">Draft : <?= News::find()->where(['status' => 0])->count() ?></a>
                    </div>
                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                        <i class="la la-file-image-o icon-3x" style="color:blue;"></i><br />
                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Banner : <?= Banner::find()->count() ?></a>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                        <i class="la la-address-book-o icon-3x" style="color:red;"></i><br />
                        <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Kontak : <?= Contact::find()->count() ?></a>
                    </div>
                    <div class="col bg-light-success px-6 py-8 rounded-xl">
                        <i class="la la-caret-square-o-right icon-3x" style="color:green;"></i><br />
                        <!--end::Svg Icon-->
                        </span>
                        <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Menu : <?= Menu::find()->count() ?></a>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Stats-->
        </div>
        <!--end::Body-->
    </div>

</div>