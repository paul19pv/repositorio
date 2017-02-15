<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mapa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mapa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_id')->textInput() ?>

    <?= $form->field($model, 'pro_id')->textInput() ?>

    <?= $form->field($model, 'uni_id')->textInput() ?>

    <?= $form->field($model, 'usu_id')->textInput() ?>

    <?= $form->field($model, 'map_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_escala')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_entidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_autor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_fecha')->textInput() ?>

    <?= $form->field($model, 'map_clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_ruta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
