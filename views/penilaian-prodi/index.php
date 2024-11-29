<?php

use app\models\PenilaianProdi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PenilaianProdiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Penilaian Prodis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-prodi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penilaian Prodi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'prodi_id',
            'indikator_id',
            'tahun',
            'nilai',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PenilaianProdi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'prodi_id' => $model->prodi_id, 'indikator_id' => $model->indikator_id, 'tahun' => $model->tahun]);
                 }
            ],
        ],
    ]); ?>


</div>
