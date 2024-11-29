<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AkreditasiProdiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="akreditasi-prodi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'prodi_id') ?>

    <?= $form->field($model, 'akreditasi_id') ?>

    <?= $form->field($model, 'lembaga_akreditasi_id') ?>

    <?= $form->field($model, 'tanggal_mulai') ?>

    <?php // echo $form->field($model, 'tanggal_akhir') ?>

    <?php // echo $form->field($model, 'no_sk') ?>

    <?php // echo $form->field($model, 'lembaga_akreditasi') ?>

    <?php // echo $form->field($model, 'file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
