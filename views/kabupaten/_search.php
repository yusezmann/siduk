<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KabupatenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kab') ?>

    <?= $form->field($model, 'nama_kab') ?>

    <?= $form->field($model, 'jmlh_penduduk') ?>

    <?= $form->field($model, 'id_prov') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
