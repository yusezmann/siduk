<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property int $id_prov
 * @property string $nama_prov
 * @property int $id_kab
 *
 * @property Kabupaten $prov
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_prov', 'id_kab'], 'required'],
            [['id_kab'], 'integer'],
            [['nama_prov'], 'string', 'max' => 50],
            [['id_prov'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_prov' => 'id_kab']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prov' => 'Id Prov',
            'nama_prov' => 'Nama Prov',
            'id_kab' => 'Jumlah Penduduk',
        ];
    }

    /**
     * Gets query for [[Prov]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProv()
    {
        return $this->hasOne(Kabupaten::className(), ['id_kab' => 'id_prov']);
    }
}
