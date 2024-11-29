<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian_prodi".
 *
 * @property int $prodi_id
 * @property int $indikator_id
 * @property string $tahun
 * @property float|null $nilai
 *
 * @property Indikator $indikator
 * @property Prodi $prodi
 */
class PenilaianProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penilaian_prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prodi_id', 'indikator_id', 'tahun'], 'required'],
            [['prodi_id', 'indikator_id'], 'integer'],
            [['nilai'], 'number'],
            [['tahun'], 'string', 'max' => 4],
            [['prodi_id', 'indikator_id', 'tahun'], 'unique', 'targetAttribute' => ['prodi_id', 'indikator_id', 'tahun']],
            [['indikator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Indikator::class, 'targetAttribute' => ['indikator_id' => 'id']],
            [['prodi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::class, 'targetAttribute' => ['prodi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prodi_id' => 'Prodi ID',
            'indikator_id' => 'Indikator ID',
            'tahun' => 'Tahun',
            'nilai' => 'Nilai',
        ];
    }

    /**
     * Gets query for [[Indikator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikator()
    {
        return $this->hasOne(Indikator::class, ['id' => 'indikator_id']);
    }

    /**
     * Gets query for [[Prodi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::class, ['id' => 'prodi_id']);
    }
}
