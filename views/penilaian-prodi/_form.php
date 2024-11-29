<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PenilaianProdi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="penilaian-prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prodi_id')->textInput() ?>

    <?= $form->field($model, 'indikator_id')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
