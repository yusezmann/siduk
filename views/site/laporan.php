<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Laporan';
?>
<div class="site-laporan">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => 'Provinsi',
                    'attribute' => 'id_prov',
                    'value' => 'provinsi.nama_prov'

                ],

                // 'id_kab',
                // 'provinsi.nama_prov',
                'nama_kab',
                'jmlh_penduduk',
                // 'id_prov',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>




</div>
