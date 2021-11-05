<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property int $id
 * @property string $nama
 * @property int $jumlah
 * @property string $kualifikasi
 * @property string $penempatan
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jumlah', 'kualifikasi', 'penempatan'], 'required'],
            [['jumlah'], 'integer'],
            [['nama', 'kualifikasi', 'penempatan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jumlah' => 'Jumlah',
            'kualifikasi' => 'Kualifikasi',
            'penempatan' => 'Penempatan',
        ];
    }
}
