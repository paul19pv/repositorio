<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Documento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'doc_id',
            'cat_id',
            'pro_id',
            'uni_id',
            'usu_id',
            // 'doc_titulo',
            // 'doc_autor',
            // 'doc_publicacion',
            // 'doc_descripcion',
            // 'doc_clave',
            // 'doc_ruta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
