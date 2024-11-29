<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prodi".
 *
 * @property int $id
 * @property string|null $nama_prodi
 * @property string|null $jenjang
 * @property int $fakultas_id
 *
 * @property AkreditasiProdi[] $akreditasiProdis
 * @property Fakultas $fakultas
 * @property PenilaianProdi[] $penilaianProdis
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fakultas_id'], 'required'],
            [['id', 'fakultas_id'], 'integer'],
            [['nama_prodi'], 'string', 'max' => 24],
            [['jenjang'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['fakultas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::class, 'targetAttribute' => ['fakultas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_prodi' => 'Nama Prodi',
            'jenjang' => 'Jenjang',
            'fakultas_id' => 'Fakultas ID',
        ];
    }

    /**
     * Gets query for [[AkreditasiProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdis()
    {
        return $this->hasMany(AkreditasiProdi::class, ['prodi_id' => 'id']);
    }

    /**
     * Gets query for [[Fakultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasOne(Fakultas::class, ['id' => 'fakultas_id']);
    }

    /**
     * Gets query for [[PenilaianProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenilaianProdis()
    {
        return $this->hasMany(PenilaianProdi::class, ['prodi_id' => 'id']);
    }
}
