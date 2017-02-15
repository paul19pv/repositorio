<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usu_cedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_confirm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
