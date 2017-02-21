<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Documento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-form col-lg-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeHiddenInput($model, 'usu_id', ["value" => Yii::$app->user->id]) ?>

    <?= $form->field($model, 'cat_id')->dropDownList($categorias) ?>

    <?= $form->field($model, 'pro_id')->dropDownList($programas) ?>

    <?= $form->field($model, 'uni_id')->dropDownList($unidades) ?>

    <?= $form->field($model, 'doc_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_autor')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'doc_publicacion')->widget(DatePicker::classname(), [
        'options'=>['class'=>'form-control'],
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd'
    ])
    ?>

    <?= $form->field($model, 'doc_descripcion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'doc_clave')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
