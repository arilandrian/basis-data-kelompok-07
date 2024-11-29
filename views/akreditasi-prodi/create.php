<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AkreditasiProdi $model */

$this->title = 'Create Akreditasi Prodi';
$this->params['breadcrumbs'][] = ['label' => 'Akreditasi Prodis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akreditasi-prodi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
