<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indikator".
 *
 * @property int $id
 * @property int $elemen_id
 * @property string|null $nama_indikator
 * @property int|null $no_urut
 * @property int|null $aktif
 *
 * @property Elemen $elemen
 * @property PenilaianProdi[] $penilaianProdis
 */
class Indikator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indikator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'elemen_id'], 'required'],
            [['id', 'elemen_id', 'no_urut', 'aktif'], 'integer'],
            [['nama_indikator'], 'string'],
            [['id'], 'unique'],
            [['elemen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Elemen::class, 'targetAttribute' => ['elemen_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'elemen_id' => 'Elemen ID',
            'nama_indikator' => 'Nama Indikator',
            'no_urut' => 'No Urut',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * Gets query for [[Elemen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getElemen()
    {
        return $this->hasOne(Elemen::class, ['id' => 'elemen_id']);
    }

    /**
     * Gets query for [[PenilaianProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenilaianProdis()
    {
        return $this->hasMany(PenilaianProdi::class, ['indikator_id' => 'id']);
    }
}
