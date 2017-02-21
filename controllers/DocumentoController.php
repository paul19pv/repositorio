<?php

namespace app\controllers;

use Yii;
use app\models\Documento;
use app\models\DocumentoSearch;
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
 * DocumentoController implements the CRUD actions for Documento model.
 */
class DocumentoController extends Controller {

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
     * Lists all Documento models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DocumentoSearch();
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
     * Displays a single Documento model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $documento = Documento::findOne($id);
        $categoria = Categoria::findOne($documento->cat_id);
        $programa = Programa::findOne($documento->pro_id);
        $unidad = Unidad::findOne($documento->uni_id);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'categoria' => $categoria,
                    'programa' => $programa,
                    'unidad' => $unidad
        ]);
    }

    /**
     * Creates a new Documento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Documento();
        $categorias = ArrayHelper::map(Categoria::find()->all(), 'cat_id', 'cat_nombre');
        $programas = ArrayHelper::map(Programa::find()->all(), 'pro_id', 'pro_nombre');
        $unidades = ArrayHelper::map(Unidad::find()->all(), 'uni_id', 'uni_nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->doc_id]);
            return $this->redirect(['upload', 'doc_id' => $model->doc_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'categorias' => $categorias,
                        'programas' => $programas,
                        'unidades' => $unidades
            ]);
        }
    }

    public function actionUpload($doc_id = null) {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            $model->doc_id = $doc_id;
            if ($model->upload_file() && $model->ruta_file($model->doc_id)) {
                return $this->redirect(['view', 'id' => $model->doc_id]);
            }
        }

        return $this->render('upload', ['model' => $model, 'doc_id' => $doc_id]);
    }

    /**
     * Updates an existing Documento model.
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
            return $this->redirect(['view', 'id' => $model->doc_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'categorias' => $categorias,
                        'programas' => $programas,
                        'unidades' => $unidades
            ]);
        }
    }

    /**
     * Deletes an existing Documento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Documento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Documento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
