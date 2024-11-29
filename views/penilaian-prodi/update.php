<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PenilaianProdi $model */

$this->title = 'Update Penilaian Prodi: ' . $model->prodi_id;
$this->params['breadcrumbs'][] = ['label' => 'Penilaian Prodis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prodi_id, 'url' => ['view', 'prodi_id' => $model->prodi_id, 'indikator_id' => $model->indikator_id, 'tahun' => $model->tahun]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penilaian-prodi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
