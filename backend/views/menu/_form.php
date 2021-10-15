<?php

use common\models\entity\News;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use common\models\entity\PageArt;
use common\models\entity\PagesArticles;
use common\models\entity\Submenu;
use mdm\widgets\TabularInput;

/* @var $this yii\web\View */
/* @var $model common\models\entity\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <div class="row">
        <div class="col-md-8 col-sm-12">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'news_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(News::find()->all(), 'id', 'title'),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ]); ?>
            <p>

            <table class="table table-condensed table-hover" style="margin-left:-5px;margin-top:-10px;">
                <thead>
                    <tr>
                        <th>Submenu</th>
                        <th class="text-right"><a id="btn-add" class="btn btn-success"><i class="fa fa-plus"></i></a></th>
                    </tr>
                </thead>

                <?= TabularInput::widget([
                    'id'            => 'detail-grid',
                    'allModels'     => $model->submenus,
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
                        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> ' . ($model->isNewRecord ? 'Create' : 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>