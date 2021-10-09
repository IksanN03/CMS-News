<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use common\models\entity\Category;
use common\models\entity\Menu;
use common\models\entity\Pages;
use common\models\entity\Sub;
use common\models\entity\Submenu;
use mdm\widgets\TabularInput;

/* @var $this yii\web\View */
/* @var $model common\models\entity\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <div class="row">
        <div class="col-md-12 col-sm-12">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Category::find()->all(), 'id', 'category_name'),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ])->label('Kategori'); ?>

            <?= $form->field($model, 'pages_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Pages::find()->all(), 'id', 'title'),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ])->label('Halaman'); ?>

            <table class="table table-condensed table-hover" style="margin-left:-5px;margin-top:-10px;">
                <thead>
                    <tr>
                        <th>Bagian</th>
                        <th class="text-right"><a id="btn-add" class="btn btn-success"><i class="fa fa-plus"></i></a></th>
                    </tr>
                </thead>

                <?= TabularInput::widget([
                    'id'            => 'detail-grid',
                    'allModels'     => $model->submenu,
                    'model'         => Submenu::className(),
                    'tag'           => 'tbody',
                    'form'          => $form,
                    'itemOptions'   => ['tag' => 'tr'],
                    'itemView'      => '_item_sub',
                    'clientOptions' => [
                        'btnAddSelector' => '#btn-add',
                    ]
                ]); ?>

            </table>

            <div class="form-panel">
                <div class="row">
                    <div class="col-sm-12">
                        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> ' . ($model->isNewRecord ? 'Simpan' : 'Edit'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>