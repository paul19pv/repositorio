<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mapa */

$this->title = 'Create Mapa';
$this->params['breadcrumbs'][] = ['label' => 'Mapas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mapa-create">

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
