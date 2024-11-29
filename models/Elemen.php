<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "elemen".
 *
 * @property int $id
 * @property string|null $nama_elemen
 * @property string|null $deskripsi
 *
 * @property Indikator[] $indikators
 */
class Elemen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'elemen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama_elemen'], 'string', 'max' => 45],
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
            'nama_elemen' => 'Nama Elemen',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * Gets query for [[Indikators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikators()
    {
        return $this->hasMany(Indikator::class, ['elemen_id' => 'id']);
    }
}
