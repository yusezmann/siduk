<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provinsi */

$this->title = 'Update Provinsi: ' . $model->id_prov;
$this->params['breadcrumbs'][] = ['label' => 'Provinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prov, 'url' => ['view', 'id' => $model->id_prov]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="provinsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
