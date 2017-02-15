<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MapaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mapa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'map_id') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'uni_id') ?>

    <?= $form->field($model, 'usu_id') ?>

    <?php // echo $form->field($model, 'map_nombre') ?>

    <?php // echo $form->field($model, 'map_escala') ?>

    <?php // echo $form->field($model, 'map_entidad') ?>

    <?php // echo $form->field($model, 'map_autor') ?>

    <?php // echo $form->field($model, 'map_fecha') ?>

    <?php // echo $form->field($model, 'map_clave') ?>

    <?php // echo $form->field($model, 'map_ruta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
