<?php

use app\models\AkreditasiProdi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AkreditasiProdiearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Akreditasi Prodi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akreditasi-prodi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Akreditasi Prodi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'prodi_id',
            'akreditasi_id',
            'lembaga_akreditasi_id',
            'tanggal_mulai',
            //'tanggal_akhir',
            //'no_sk',
            //'lembaga_akreditasi',
            //'file',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AkreditasiProdi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
