<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Documento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_id')->textInput() ?>

    <?= $form->field($model, 'pro_id')->textInput() ?>

    <?= $form->field($model, 'uni_id')->textInput() ?>

    <?= $form->field($model, 'usu_id')->textInput() ?>

    <?= $form->field($model, 'doc_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_autor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_publicacion')->textInput() ?>

    <?= $form->field($model, 'doc_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_ruta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
