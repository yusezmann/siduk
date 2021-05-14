<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KabupatenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupatens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Kabupaten', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export PDF', ['export-pdf'], ['class'=>'btn btn-danger']); ?> 
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_kab',
            // 'nama_kab',
            // 'jmlh_penduduk',
            [
                'label'=>'Nama Provinsi',
                'attribute'=>'id_prov',
                'value'=>'idprov0.nama_prov',
            ],
            [
                'label'=>'Nama Kabupaten',
                'attribute'=>'nama_kab',
            ],
            [
                'label'=>'Jumlah Penduduk',
                'attribute'=>'jmlh_penduduk',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
