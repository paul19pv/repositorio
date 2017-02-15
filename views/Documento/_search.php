<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'uni_id') ?>

    <?= $form->field($model, 'usu_id') ?>

    <?php // echo $form->field($model, 'doc_titulo') ?>

    <?php // echo $form->field($model, 'doc_autor') ?>

    <?php // echo $form->field($model, 'doc_publicacion') ?>

    <?php // echo $form->field($model, 'doc_descripcion') ?>

    <?php // echo $form->field($model, 'doc_clave') ?>

    <?php // echo $form->field($model, 'doc_ruta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
