<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mapa */

$this->title = 'Update Mapa: ' . $model->map_id;
$this->params['breadcrumbs'][] = ['label' => 'Mapas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->map_id, 'url' => ['view', 'id' => $model->map_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mapa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'categorias' => $categorias,
        'programas' => $programas,
        'unidades' => $unidades
    ])
    ?>

</div>
