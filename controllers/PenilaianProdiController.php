<?php

namespace app\controllers;

use app\models\PenilaianProdi;
use app\models\PenilaianProdiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenilaianProdiController implements the CRUD actions for PenilaianProdi model.
 */
class PenilaianProdiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all PenilaianProdi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PenilaianProdiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PenilaianProdi model.
     * @param int $prodi_id Prodi ID
     * @param int $indikator_id Indikator ID
     * @param string $tahun Tahun
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($prodi_id, $indikator_id, $tahun)
    {
        return $this->render('view', [
            'model' => $this->findModel($prodi_id, $indikator_id, $tahun),
        ]);
    }

    /**
     * Creates a new PenilaianProdi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PenilaianProdi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'prodi_id' => $model->prodi_id, 'indikator_id' => $model->indikator_id, 'tahun' => $model->tahun]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PenilaianProdi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $prodi_id Prodi ID
     * @param int $indikator_id Indikator ID
     * @param string $tahun Tahun
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($prodi_id, $indikator_id, $tahun)
    {
        $model = $this->findModel($prodi_id, $indikator_id, $tahun);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'prodi_id' => $model->prodi_id, 'indikator_id' => $model->indikator_id, 'tahun' => $model->tahun]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PenilaianProdi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $prodi_id Prodi ID
     * @param int $indikator_id Indikator ID
     * @param string $tahun Tahun
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($prodi_id, $indikator_id, $tahun)
    {
        $this->findModel($prodi_id, $indikator_id, $tahun)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PenilaianProdi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $prodi_id Prodi ID
     * @param int $indikator_id Indikator ID
     * @param string $tahun Tahun
     * @return PenilaianProdi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($prodi_id, $indikator_id, $tahun)
    {
        if (($model = PenilaianProdi::findOne(['prodi_id' => $prodi_id, 'indikator_id' => $indikator_id, 'tahun' => $tahun])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
