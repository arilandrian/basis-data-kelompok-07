<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akreditasi_prodi".
 *
 * @property int $id
 * @property int $prodi_id
 * @property string $akreditasi_id
 * @property int $lembaga_akreditasi_id
 * @property string|null $tanggal_mulai
 * @property string|null $tanggal_akhir
 * @property string|null $no_sk
 * @property string|null $lembaga_akreditasi
 * @property string|null $file
 *
 * @property KategoriAkreditasi $akreditasi
 * @property LembagaAkreditasi $lembagaAkreditasi
 * @property Prodi $prodi
 */
class AkreditasiProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akreditasi_prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'prodi_id', 'akreditasi_id', 'lembaga_akreditasi_id'], 'required'],
            [['id', 'prodi_id', 'lembaga_akreditasi_id'], 'integer'],
            [['tanggal_mulai', 'tanggal_akhir'], 'safe'],
            [['akreditasi_id'], 'string', 'max' => 25],
            [['no_sk', 'file'], 'string', 'max' => 45],
            [['lembaga_akreditasi'], 'string', 'max' => 145],
            [['id'], 'unique'],
            [['akreditasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriAkreditasi::class, 'targetAttribute' => ['akreditasi_id' => 'id']],
            [['lembaga_akreditasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => LembagaAkreditasi::class, 'targetAttribute' => ['lembaga_akreditasi_id' => 'id']],
            [['prodi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::class, 'targetAttribute' => ['prodi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prodi_id' => 'Prodi ID',
            'akreditasi_id' => 'Akreditasi ID',
            'lembaga_akreditasi_id' => 'Lembaga Akreditasi ID',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_akhir' => 'Tanggal Akhir',
            'no_sk' => 'No Sk',
            'lembaga_akreditasi' => 'Lembaga Akreditasi',
            'file' => 'File',
        ];
    }

    /**
     * Gets query for [[Akreditasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasi()
    {
        return $this->hasOne(KategoriAkreditasi::class, ['id' => 'akreditasi_id']);
    }

    /**
     * Gets query for [[LembagaAkreditasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLembagaAkreditasi()
    {
        return $this->hasOne(LembagaAkreditasi::class, ['id' => 'lembaga_akreditasi_id']);
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
