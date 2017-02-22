<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="documento-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= Html::activeHiddenInput($model, 'doc_id', ["value" => $doc_id]) ?>
    <?= $form->field($model, 'docFile')->fileInput() ?>
    <?= Html::tag('p', 'Archivos permitidos: pdf, txt,doc,docx', ['class' => 'help-block']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end() ?>

</div>
