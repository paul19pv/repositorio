<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = 'Update Unidad: ' . $model->uni_id;
$this->params['breadcrumbs'][] = ['label' => 'Unidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uni_id, 'url' => ['view', 'id' => $model->uni_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
