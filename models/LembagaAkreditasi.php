<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lembaga_akreditasi".
 *
 * @property int $id
 * @property string|null $nama_lembaga
 *
 * @property AkreditasiProdi[] $akreditasiProdis
 */
class LembagaAkreditasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lembaga_akreditasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nama_lembaga'], 'string', 'max' => 145],
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
            'nama_lembaga' => 'Nama Lembaga',
        ];
    }

    /**
     * Gets query for [[AkreditasiProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdis()
    {
        return $this->hasMany(AkreditasiProdi::class, ['lembaga_akreditasi_id' => 'id']);
    }
}
