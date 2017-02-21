<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Documento */

$this->title = $model->doc_titulo;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->doc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->doc_id], [
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
                'label'=>'Titulo',
                'value'=>$model->doc_titulo
            ],
            [
                'label'=>'Autor',
                'value'=>$model->doc_autor
            ],
            [
                'label'=>'Fecha de Publicación',
                'value'=>$model->doc_publicacion
            ],
            [
                'label'=>'Descripción',
                'value'=>$model->doc_descripcion
            ],
            [
                'label'=>'Palabras Clave',
                'value'=>$model->doc_clave
            ]
        ],
    ]) ?>
    <embed src="<?= Url::to('@web/'.$model->doc_ruta, true); ?>" width="1180px" height="600px">
</div>
