<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
        $dataPost=ArrayHelper::map(\app\models\provinsi::find()->asArray()->all(), 'id_prov', 'nama_prov');
        echo $form->field($model, 'id_prov')
            ->dropDownList(
                $dataPost,           
                ['id_prov'=>'nama_prov']
            );
    ?>

    <?= $form->field($model, 'nama_kab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jmlh_penduduk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
