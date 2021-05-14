<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property int $id_prov
 * @property string $nama_prov
 *
 * @property Kabupaten[] $kabupatens
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
            [['nama_prov'], 'required'],
            [['nama_prov'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * Gets query for [[Kabupatens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKab()
    {
        return $this->hasOne(Kabupaten::className(), ['id_prov' => 'id_prov']);
    }
}
