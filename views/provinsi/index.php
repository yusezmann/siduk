<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProvinsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinsi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provinsi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Provinsi', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export PDF', ['export-pdf'], ['class'=>'btn btn-info']); ?>  

    <?php
        // echo Html::a('<i class="fa far fa-hand-point-up"></i> Privacy Statement', ['/provinsi/lap_provinsi'], [
        //     'class'=>'btn btn-danger', 
        //     'target'=>'_blank', 
        //     'data-toggle'=>'tooltip', 
        //     'title'=>'Will open the generated PDF file in a new window'
        // ]);
    ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prov',
            'nama_prov',
            [
                'label'=> 'Jumlah Penduduk',
                'attribute'=>'jmlh_penduduk',
                'value'=>'prov.jmlh_penduduk',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
