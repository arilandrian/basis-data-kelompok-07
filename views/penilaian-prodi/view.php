<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PenilaianProdi $model */

$this->title = $model->prodi_id;
$this->params['breadcrumbs'][] = ['label' => 'Penilaian Prodis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penilaian-prodi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'prodi_id' => $model->prodi_id, 'indikator_id' => $model->indikator_id, 'tahun' => $model->tahun], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'prodi_id' => $model->prodi_id, 'indikator_id' => $model->indikator_id, 'tahun' => $model->tahun], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prodi_id',
            'indikator_id',
            'tahun',
            'nilai',
        ],
    ]) ?>

</div>
