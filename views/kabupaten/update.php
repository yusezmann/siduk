<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kabupaten */

$this->title = 'Update Kabupaten: ' . $model->id_kab;
$this->params['breadcrumbs'][] = ['label' => 'Kabupaten', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kab, 'url' => ['view', 'id' => $model->id_kab]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kabupaten-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
