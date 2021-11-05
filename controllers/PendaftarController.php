<?php

namespace app\controllers;

use Yii;
use app\models\Pendaftar;
use app\models\PendaftarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * PendaftarController implements the CRUD actions for Pendaftar model.
 */
class PendaftarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
     * Lists all Pendaftar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PendaftarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pendaftar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pendaftar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
        $model = new Pendaftar();
        $model->saveOld();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->created_at = date('Y-m-d H:i:s');
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pendaftar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pendaftar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    
    /**
     * Finds the Pendaftar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pendaftar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pendaftar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionCetak($id)
    {
        $model = $this->findModel($id);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('cetak', ['model' => $model]),
             // A4 paper format
       
              // format content from your own css file if needed or use the
              // enhanced bootstrap css built by Krajee for mPDF formatting
                  //     'cssFile' => '@app/web/css/print.css',
       
                   'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
  
            'options' => [
                'title' => 'Cetak Data Pendaftar',
                'subject' => 'Cetak Data Pendaftar',
                'keywords' => 'cetak, data, pendaftar'
            ],
            'methods' => [
                'SetHeader' => ['Cetak Data Pendaftar'],
                'SetFooter' => ['UIN Sunan Ampel Surabaya'],
            ]
        ]);
        return $pdf->render();
    }
}
