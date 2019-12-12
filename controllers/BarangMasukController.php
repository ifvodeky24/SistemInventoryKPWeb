<?php

namespace app\controllers;

use Yii;
use app\models\BarangMasuk;
use app\models\BarangMasukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * BarangMasukController implements the CRUD actions for BarangMasuk model.
 */
class BarangMasukController extends Controller
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

    public function actionIndex()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_masuk')
        ->leftJoin('tb_barang_master', 'tb_barang_master.id_barang_master = tb_barang_masuk.id_barang_master')
        ->orderBy('id_barang_masuk ASC')
        ->all();

        return $this->render('index', ['model'=>$model,]);  
    }

    public function actionIndexManager()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_masuk')
        ->leftJoin('tb_barang_master', 'tb_barang_master.id_barang_master = tb_barang_masuk.id_barang_master')
        ->orderBy('id_barang_masuk ASC')
        ->all();

        return $this->render('index-manager', ['model'=>$model,]);  
    }
    /**
     * Displays a single BarangMasuk model.
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

    public function actionViewManager($id)
    {
        return $this->render('view-manager', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionPrintLaporan()
    {
       $model = new BarangMasuk();

       $data= (new \yii\db\Query());
       $data  
       ->select(['tb_barang_masuk.*', 'tb_barang_master.*']) 
       ->from('tb_barang_masuk')
       ->leftJoin('tb_barang_master', 'tb_barang_masuk.id_barang_master = tb_barang_master.id_barang_master');
       $command = $data->createCommand();
       $modelasset = $command->queryAll();

       $mpdf = new \Mpdf\Mpdf();
       $mpdf->SetTitle('Laporan Data Barang Masuk');
       $mpdf->WriteHTML($this->renderPartial('hasil-laporan-barang-masuk',[
            'model' => $model,
            'modelasset' => $modelasset,
        ]
        ));
        $mpdf->Output('Laporan Barang Masuk.pdf','I');
        exit;
    }

    /**
     * Creates a new BarangMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BarangMasuk();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_barang_masuk]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BarangMasuk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_barang_masuk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BarangMasuk model.
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
     * Finds the BarangMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BarangMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BarangMasuk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
