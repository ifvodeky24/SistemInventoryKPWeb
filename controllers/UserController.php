<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new UserSearch();
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
        ->from('tb_user')
        ->orderBy('id_user ASC')
        ->all();

        return $this->render('index', ['model'=>$model,]);  
    }

    public function actionProfil()
    {

    $model = new User();

    return $this->render('profil', [
        'model'=>$model,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            // $model->password = password_hash($model->password, PASSWORD_DEFAULT);
            $model->foto_profil = UploadedFile::getInstance($model,'foto_profil');
                 if($model->foto_profil){
                    $photos = $model->foto_profil->name;
                    if ($model->foto_profil->saveAs('files/images/'.$photos)){
                        $model->foto_profil = $photos; 
                    }
                }

                $model->save(false);

            Yii::$app->getSession()->setFlash('success','Data tersimpan');
            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $old_photo_user = $model->foto_profil;

        if ($model->load(Yii::$app->request->post()) ) {
                $model->password = password_hash($model->password, PASSWORD_DEFAULT);
                $model->foto_profil = UploadedFile::getInstance($model,'foto_profil');
                if($model->foto_profil){
                    $pp = $model->foto_profil->name;
                    if($model->foto_profil->saveAs('files/images/'.$pp)){
                        $model->foto_profil = $pp;
                    }
                }
                if(empty($model->foto_profil)){
                    $model->foto_profil = $old_photo_user;
                }
                $model->save(false);

                Yii::$app->getSession()->setFlash('success','Data tersimpan');
                return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
