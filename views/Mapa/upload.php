<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="documento-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= Html::activeHiddenInput($model, 'map_id', ["value" => $map_id]) ?>
    <?= $form->field($model, 'mapFile')->fileInput() ?>
    <?= Html::tag('p', 'Archivos permitidos: zip, rar, kmz, kml', ['class' => 'help-block']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end() ?>

</div>
