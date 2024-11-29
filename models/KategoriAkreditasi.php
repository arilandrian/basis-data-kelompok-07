<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_akreditasi".
 *
 * @property string $id
 * @property string|null $deskripsi
 *
 * @property AkreditasiProdi[] $akreditasiProdis
 */
class KategoriAkreditasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_akreditasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['deskripsi'], 'string'],
            [['id'], 'string', 'max' => 25],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * Gets query for [[AkreditasiProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdis()
    {
        return $this->hasMany(AkreditasiProdi::class, ['akreditasi_id' => 'id']);
    }
}
