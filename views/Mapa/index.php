<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MapaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mapas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mapa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mapa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'map_id',
            'cat_id',
            'pro_id',
            'uni_id',
            'usu_id',
            // 'map_nombre',
            // 'map_escala',
            // 'map_entidad',
            // 'map_autor',
            // 'map_fecha',
            // 'map_clave',
            // 'map_ruta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
