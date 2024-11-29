<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "universitas".
 *
 * @property int $id
 * @property string|null $nama_universitas
 *
 * @property Fakultas[] $fakultas
 */
class Universitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'universitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nama_universitas'], 'string', 'max' => 145],
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
            'nama_universitas' => 'Nama Universitas',
        ];
    }

    /**
     * Gets query for [[Fakultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasMany(Fakultas::class, ['universitas_id' => 'id']);
    }
}
