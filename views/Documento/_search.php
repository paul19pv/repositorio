<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-search col-lg-6">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>



    <?= $form->field($model, 'cat_id')->dropDownList($categorias, ['prompt' => ['text' => 'Todas', 'options' => ['value' => '', 'class' => 'prompt']]]) ?>

    <?= $form->field($model, 'uni_id')->dropDownList($unidades, ['prompt' => ['text' => 'Todas', 'options' => ['value' => '', 'class' => 'prompt']]]) ?>

    <?php echo $form->field($model, 'doc_titulo') ?>

    <?php echo $form->field($model, 'doc_autor') ?>

    <?php
    echo $form->field($model, 'doc_publicacion')->widget(DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd'
    ])
    ?>

    <?php // echo $form->field($model, 'doc_descripcion') ?>

        <?php echo $form->field($model, 'doc_clave') ?>

        <?php // echo $form->field($model, 'doc_ruta') ?>

    <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
