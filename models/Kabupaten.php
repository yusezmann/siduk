<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property int $id_kab
 * @property string $nama_kab
 * @property int $jmlh_penduduk
 * @property int $id_prov
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kab', 'jmlh_penduduk', 'id_prov'], 'required'],
            [['jmlh_penduduk', 'id_prov'], 'integer'],
            [['nama_kab'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kab' => 'ID Kabupaten',
            'nama_kab' => 'Nama Kabupaten',
            'jmlh_penduduk' => 'Jumlah Penduduk',
            'id_prov' => 'Provinsi',
        ];
    }

    public function getProvinsi()
    {
        return $this->hasOne(provinsi::className(), ['id_prov' => 'id_prov']);
    }
}
