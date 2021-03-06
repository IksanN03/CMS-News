<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4" style="background-image: radial-gradient(rgb(15, 242, 159, 0.3) 1%, rgb(1, 31, 38, 0.7) 99%);color:white;">

        <!-- <h1><?= Html::encode($this->title) ?></h1> -->
        <div class="wow fadeIn" data-wow-delay="800ms">
            <p>Please fill out the following fields to change your password: </p>
            <br>

            <?php $form = ActiveForm::begin([
                'id' => 'changepassword-form',
            ]); ?>

            <?= $form->field($model, 'oldpass', ['inputOptions' => [
                'placeholder' => ''
            ]])->passwordInput() ?>

            <?= $form->field($model, 'newpass', ['inputOptions' => [
                'placeholder' => ''
            ]])->passwordInput() ?>

            <?= $form->field($model, 'repeatnewpass', ['inputOptions' => [
                'placeholder' => ''
            ]])->passwordInput() ?>

            <div class="form-panel">
                <?= Html::submitButton('Change password', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>