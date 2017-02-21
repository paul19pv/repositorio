<?php

namespace app\controllers;

use Yii;
use app\models\Mapa;
use app\models\MapaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\models\Categoria;
use app\models\Programa;
use app\models\Unidad;

/**
 * MapaController implements the CRUD actions for Mapa model.
 */
class MapaController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mapa models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MapaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categorias = ArrayHelper::map(Categoria::find()->all(), 'cat_id', 'cat_nombre');
        $programas = ArrayHelper::map(Programa::find()->all(), 'pro_id', 'pro_nombre');
        $unidades = ArrayHelper::map(Unidad::find()->all(), 'uni_id', 'uni_nombre');
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'categorias' => $categorias,
                    'programas' => $programas,
                    'unidades' => $unidades
        ]);
    }

    /**
     * Displays a single Mapa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $mapa = Mapa::findOne($id);
        $categoria = Categoria::findOne($mapa->cat_id);
        $programa = Programa::findOne($mapa->pro_id);
        $unidad = Unidad::findOne($mapa->uni_id);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'categoria' => $categoria,
                    'programa' => $programa,
                    'unidad' => $unidad
        ]);
    }

    /**
     * Creates a new Mapa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Mapa();
        $categorias = ArrayHelper::map(Categoria::find()->all(), 'cat_id', 'cat_nombre');
        $programas = ArrayHelper::map(Programa::find()->all(), 'pro_id', 'pro_nombre');
        $unidades = ArrayHelper::map(Unidad::find()->all(), 'uni_id', 'uni_nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['upload', 'map_id' => $model->map_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'categorias' => $categorias,
                        'programas' => $programas,
                        'unidades' => $unidades
            ]);
        }
    }

    public function actionUpload($map_id = null) {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->mapFile = UploadedFile::getInstance($model, 'mapFile');
            $model->map_id = $map_id;
            if ($model->upload_file() && $model->ruta_file($model->map_id)) {
                return $this->redirect(['view', 'id' => $model->map_id]);
            }
        }

        return $this->render('upload', ['model' => $model, 'map_id' => $map_id]);
    }

    /**
     * Updates an existing Mapa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $categorias = ArrayHelper::map(Categoria::find()->all(), 'cat_id', 'cat_nombre');
        $programas = ArrayHelper::map(Programa::find()->all(), 'pro_id', 'pro_nombre');
        $unidades = ArrayHelper::map(Unidad::find()->all(), 'uni_id', 'uni_nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->map_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'categorias' => $categorias,
                        'programas' => $programas,
                        'unidades' => $unidades
            ]);
        }
    }

    /**
     * Deletes an existing Mapa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mapa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mapa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Mapa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
