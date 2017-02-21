<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mapa */

$this->title = $model->map_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Mapas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mapa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->map_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->map_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => [$model,$categoria,$programa,$unidad],
        'attributes' => [
            [
                'label'=>'Categoria',
                'value'=>$categoria->cat_nombre
            ],[
              'label'=>'Programa',
                'value'=>$programa->pro_nombre
            ],
            [
                'label'=>'Unidad Hídrica',
                'value'=>$unidad->uni_nombre
            ],
            [
                'label'=>'Nombre',
                'value'=>$model->map_nombre
            ],
            [
                'label'=>'Escala',
                'value'=>$model->map_escala
            ],
            [
                'label'=>'Entidad',
                'value'=>$model->map_entidad
            ],
            [
                'label'=>'Elaborado por',
                'value'=>$model->map_autor
            ],
            [
                'label'=>'Fecha de Elaboración',
                'value'=>$model->map_fecha
            ],
            [
                'label'=>'Palabras Clave',
                'value'=>$model->map_clave
            ],
        ],
    ]) ?>

</div>
