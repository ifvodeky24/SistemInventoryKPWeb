<?php

namespace app\controllers;

use Yii;
use app\models\BarangKeluar;
use app\models\BarangKeluarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * BarangKeluarController implements the CRUD actions for BarangKeluar model.
 */
class BarangKeluarController extends Controller
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
        ->from('tb_barang_keluar')
        ->leftJoin('tb_barang_master', 'tb_barang_master.id_barang_master = tb_barang_keluar.id_barang_master')
        ->orderBy('id_barang_keluar ASC')
        ->all();

        return $this->render('index', ['model'=>$model,]);  
    }

    public function actionIndexManager()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_keluar')
        ->leftJoin('tb_barang_master', 'tb_barang_master.id_barang_master = tb_barang_keluar.id_barang_master')
        ->orderBy('id_barang_keluar ASC')
        ->all();

        return $this->render('index-manager', ['model'=>$model,]);  
    }
    /**
     * Displays a single BarangKeluar model.
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

    // public function actionPrintLaporan()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $mpdf->WriteHTML('Sample Text');
    //     $mpdf->Output();
    //     exit;
    // }

    public function actionPrintLaporan()
    {
       $model = new BarangKeluar();

       $data= (new \yii\db\Query());
       $data  
       ->select(['tb_barang_keluar.*', 'tb_barang_master.*']) 
       ->from('tb_barang_keluar')
       ->leftJoin('tb_barang_master', 'tb_barang_keluar.id_barang_master = tb_barang_master.id_barang_master');
       $command = $data->createCommand();
       $modelasset = $command->queryAll();

       $mpdf = new \Mpdf\Mpdf();
       $mpdf->SetTitle('Laporan Data Barang Keluar');
       $mpdf->WriteHTML($this->renderPartial('hasil-laporan-barang-keluar',[
            'model' => $model,
            'modelasset' => $modelasset,
        ]
        ));
        $mpdf->Output('Laporan Barang Keluar.pdf','I');
        exit;
    }

    /**
     * Creates a new BarangKeluar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BarangKeluar();

        if ($model->load(Yii::$app->request->post())) {

            $id_barang_keluar_post= Yii::$app->request->post('BarangKeluar')['id_barang_master'];

            $model_barang_keluar = (new \yii\db\Query())
                        ->select('*')
                        ->from('tb_barang_keluar')
                        ->rightJoin('tb_barang_master', 'tb_barang_master.id_barang_master = tb_barang_keluar.id_barang_master')
                        ->where(['tb_barang_master.id_barang_master' => $id_barang_keluar_post])
                        ->one();

            $stok_barang = $model_barang_keluar['stok_barang'];


            $test = $stok_barang - Yii::$app->request->post('BarangKeluar')['jumlah_barang'];   

            // var_dump($test);
            // exit();

            if ($test <= 0) {
                Yii::$app->session->setFlash('error', "Stok Barang Kurang, Tambah Stok Barang Terlebih Dahulu");
            }else{
                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id_barang_keluar]);
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BarangKeluar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_barang_keluar]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BarangKeluar model.
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
     * Finds the BarangKeluar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BarangKeluar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BarangKeluar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
