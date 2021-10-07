<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use common\models\entity\Category;
use common\models\entity\User;
use common\models\entity\Files;
use common\models\entity\News;
use mdm\widgets\TabularInput;
use dosamigos\ckeditor\CKEditor;
use kartik\depdrop\DepDrop;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\entity\News */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="news-form">

    <div class="row">
        <div class="col-md-12 col-sm-12">

            <?php $form = ActiveForm::begin(); ?>
            <div class="panel panel-warning" style="margin-top:30px">
                <div class="panel-heading" style="background:#A9E4D7;">
                    Bagian 1*
                </div>
                <div class="panel-body">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Category::find()->all(), 'id', 'category_name'),
                        'options' => ['placeholder' => '', 'prompt' => 'null', 'id' => 'cat-id'],
                        'pluginOptions' => ['allowClear' => true],
                    ]); ?>

                    <?= $form->field($model, 'subcategory_id')->widget(DepDrop::classname(), [
                        'type' => DepDrop::TYPE_SELECT2,
                        'options' => ['id' => 'subcat-id', 'prompt' => 'null'],
                        'pluginOptions' => [
                            'depends' => ['cat-id'],
                            'placeholder' => '',
                            'url' => Url::to(['news/subcat'])
                        ]
                    ]);
                    ?>

                    <?= $form->field($model, 'publish_at', [
                        'inputOptions' =>
                        [
                            'value' => date('Y-m-d'),
                        ],
                    ])->widget(DatePicker::classname(), [
                        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                        'readonly' => true,
                        'disabled' => true,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ],
                    ]); ?>
                </div>
            </div>

            <div class="panel panel-warning" style="margin-top:30px">
                <div class="panel-heading" style="background:#A9E4D7;">
                    Bagian 2*
                </div>
                <div class="panel-body">
                    <?= $form->field($model, 'author_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(User::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => ''],
                        'pluginOptions' => ['allowClear' => true],
                    ]); ?>

                    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                        'options' => ['rows' => 10],
                        'preset' => 'advanced'
                    ]) ?>

                    <?= $form->field($model, 'photo')->FileInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="panel panel-warning" style="margin-top:30px">
                <div class="col-md-6">
                    <div class="panel-heading" style="background:#A9E4D7;">
                        Bagian 3*
                    </div>
                    <div class="panel-body">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Url Foto</th>
                                    <th> Url Page</th>
                                    <th class="text-right"><a id="btn-add" class="btn btn-success"><i class="fa fa-plus"></i></a></th>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </thead>

                            <?= TabularInput::widget([
                                'id'            => 'detail-grid',
                                'allModels'     => $model->files,
                                'model'         => Files::className(),
                                'tag'           => 'tbody',
                                'form'          => $form,
                                'itemOptions'   => ['tag' => 'tr'],
                                'itemView'      => '_item_news',
                                'clientOptions' => [
                                    'btnAddSelector' => '#btn-add',
                                ]
                            ]); ?>

                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel-heading" style="background:#A9E4D7;">
                        Bagian 4*
                    </div>

                    <?= $form->field($model, 'status')->widget(Select2::classname(), [
                        'data' => News::statuses(),
                        'options' => ['placeholder' => ''],
                        'pluginOptions' => ['allowClear' => true],
                    ]); ?>


                </div>
            </div>
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