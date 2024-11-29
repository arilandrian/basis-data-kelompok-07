<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fakultas".
 *
 * @property int $id
 * @property string|null $nama_fakultas
 * @property string|null $singkatan
 * @property int $universitas_id
 *
 * @property Prodi[] $prodis
 * @property Universitas $universitas
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'universitas_id'], 'required'],
            [['id', 'universitas_id'], 'integer'],
            [['nama_fakultas', 'singkatan'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['universitas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Universitas::class, 'targetAttribute' => ['universitas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_fakultas' => 'Nama Fakultas',
            'singkatan' => 'Singkatan',
            'universitas_id' => 'Universitas ID',
        ];
    }

    /**
     * Gets query for [[Prodis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdis()
    {
        return $this->hasMany(Prodi::class, ['fakultas_id' => 'id']);
    }

    /**
     * Gets query for [[Universitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUniversitas()
    {
        return $this->hasOne(Universitas::class, ['id' => 'universitas_id']);
    }
}
