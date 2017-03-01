<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\MapaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mapa-search col-lg-12">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => ['class' => 'form-inline']
    ]);
    ?>

    <?= $form->field($model, 'cat_id')->dropDownList($categorias, ['prompt' => ['text' => 'Todas', 'options' => ['value' => '', 'class' => 'prompt']]]) ?>

    <?= $form->field($model, 'uni_id')->dropDownList($unidades, ['prompt' => ['text' => 'Todas', 'options' => ['value' => '', 'class' => 'prompt']]]) ?>

    <?php echo $form->field($model, 'map_nombre') ?>

    <?php // echo $form->field($model, 'map_escala')  ?>

    <?php // echo $form->field($model, 'map_entidad')  ?>

    <?php echo $form->field($model, 'map_autor') ?>

    <?php
    echo $form->field($model, 'map_elaboracion')->widget(DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd'
    ])
    ?>
    
    <?php
    echo $form->field($model, 'map_recepcion')->widget(DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd'
    ])
    ?>

    <?php echo $form->field($model, 'map_clave') ?>

    <?php // echo $form->field($model, 'map_ruta')  ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
