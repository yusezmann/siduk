<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KabupatenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupaten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?=  Html::a('Create Kabupaten', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export PDF', ['export-pdf'], ['class'=>'btn btn-info']); ?>  
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'filterModel'=> true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label'=> 'Nama Provinsi',
                'attribute'=> 'id_prov',
                'value'=>'provinsi.nama_prov',
                'filter'=> Html::textInput('id_prov',Yii::$app->request->get('id_prov'),['class'=>'form-control'])
            ],
            'id_kab',
            [
                'label'=> 'Nama Kabupaten',
                'attribute'=> 'nama_kab',
                'filter'=> Html::textInput('nama_kab',Yii::$app->request->get('nama_kab'),['class'=>'form-control'])
            ],
            [
                'label'=> 'Jumlah Penduduk',
                'attribute'=> 'jmlh_penduduk',
                'filter'=> Html::textInput('jmlh_penduduk',Yii::$app->request->get('jmlh_penduduk'),['class'=>'form-control'])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
