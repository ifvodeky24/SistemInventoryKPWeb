<?php

namespace app\controllers;

use Yii;
use app\models\BarangMaster;
use app\models\BarangMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BarangMasterController implements the CRUD actions for BarangMaster model.
 */
class BarangMasterController extends Controller
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
     * Lists all BarangMaster models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new BarangMasterSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionIndex()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index', ['model'=>$model,]);  
    }

    public function actionIndexLogistik()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-logistik', ['model'=>$model,]);  
    }

    public function actionIndexSemen()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Semen'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-semen', ['model'=>$model,]);  
    }

    public function actionIndexPasir()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Pasir'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-pasir', ['model'=>$model,]);  
    }

    public function actionIndexSplitSetengah()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Split Setengah'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-split-setengah', ['model'=>$model,]);  
    }

    public function actionIndexSplitMedium()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Split Medium'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-split-medium', ['model'=>$model,]);  
    }

    public function actionIndexPcWire()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'PC Wire'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-pc-wire', ['model'=>$model,]);  
    }

    public function actionIndexSpiralWire()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Spiral Wire'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-spiral-wire', ['model'=>$model,]);  
    }

    public function actionIndexKawatIkat()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Kawat Ikat'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-kawat-ikat', ['model'=>$model,]);  
    }

    public function actionIndexBesiD16()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Besi D16'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-besi-d16', ['model'=>$model,]);  
    }

    public function actionIndexPipaSetengah()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Pipa Setengah'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-pipa-setengah', ['model'=>$model,]);  
    }

    public function actionIndexBautAdre()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Baut Adre'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-baut-adre', ['model'=>$model,]);  
    }

    public function actionIndexMur()
    {
        $model= (new \yii\db\Query())
        ->select('*')
        ->from('tb_barang_master')
        ->where(['jenis_barang'=> 'Mur'])
        ->orderBy('id_barang_master ASC')
        ->all();

        return $this->render('index-mur', ['model'=>$model,]);  
    }

    /**
     * Displays a single BarangMaster model.
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
     * Creates a new BarangMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BarangMaster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_barang_master]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BarangMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_barang_master]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BarangMaster model.
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
     * Finds the BarangMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BarangMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BarangMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
