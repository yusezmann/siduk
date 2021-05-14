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
 *
 * @property Provinsi $id_prov0
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
            [['id_prov'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_prov' => 'id_prov']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kab' => 'Id Kab',
            'nama_kab' => 'Nama Kab',
            'jmlh_penduduk' => 'Jmlh Penduduk',
            'id_prov' => 'Idprov',
        ];
    }

    /**
     * Gets query for [[Idprov0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdprov0()
    {
        return $this->hasOne(Provinsi::className(), ['id_prov' => 'id_prov']);
    }
}
