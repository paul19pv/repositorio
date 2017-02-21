<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel,'categorias'=>$categorias,'unidades'=>$unidades]);  ?>
    <br clear="both">
    <div class="form-group" style="float: right">
        <?= Html::a('Create Documento', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?=
    GridView::widget([
        'summary'=>'',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'cat_id',
                'content' => function ($model, $key, $index, $column) {
                    $categoria = app\models\Categoria::findOne($model->cat_id);
                    if (!empty($categoria)) {
                        return $categoria->cat_nombre;
                    } else {
                        return "Sin Categoria";
                    }
                },
                'format' => 'text',
                'label' => 'Categoria',
            ],
            [
                'attribute' => 'uni_id',
                'content' => function ($model, $key, $index, $column) {
                    $unidad = app\models\Unidad::findOne($model->uni_id);
                    if (!empty($unidad)) {
                        return $unidad->uni_nombre;
                    } else {
                        return "Sin Unidad";
                    }
                },
                'format' => 'text',
                'label' => 'Unidad Hídrica',
            ],
            'doc_titulo',
            'doc_autor',
            'doc_publicacion',
            // 'doc_descripcion',
            // 'doc_clave',
            // 'doc_ruta',
            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{upload}',
                'buttons' => [
                    'upload' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-upload"></span>', $url);
                    },
                ]
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{download}',
                'buttons' => [
                    'download' => function ($url, $model, $key) {
                        if ($model->doc_ruta !== '') {
                            return Html::a('<span class="glyphicon glyphicon-download"></span>', Url::to('@web/' . $model->doc_ruta, true), ["target" => "_blank"]);
                        } else {
                            return '';
                        }
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
