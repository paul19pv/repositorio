<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Documento */

$this->title = 'Update Documento: ' . $model->doc_id;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->doc_id, 'url' => ['view', 'id' => $model->doc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'categorias'=>$categorias,
        'programas' => $programas,
        'unidades' => $unidades
    ])
    ?>

</div>
