<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usu_id') ?>

    <?= $form->field($model, 'usu_cedula') ?>

    <?= $form->field($model, 'usu_nombre') ?>

    <?= $form->field($model, 'usu_apellido') ?>

    <?= $form->field($model, 'usu_usuario') ?>

    <?php // echo $form->field($model, 'usu_password') ?>

    <?php // echo $form->field($model, 'usu_confirm') ?>

    <?php // echo $form->field($model, 'usu_correo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
