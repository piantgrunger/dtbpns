<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "pendaftar".
 *
 * @property int $id
 * @property int $jabatan_id
 * @property string $nik
 * @property string $nama
 * @property string $alamat
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $agama
 * @property string $no_hp
 * @property string $pendidikan_terakhir
 * @property string $file_ktp
 * @property string $file_foto
 * @property string $file_ijazah
 * @property string $file_daftar_riwayat_hidup
 * @property string $file_surat_bebas_penyalahgunaan_narkoba
 * @property string $created_at
 *
 * 
 * @property Jabatan $jabatan
 */
class Pendaftar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    private $_old_file;
    private $_berkas = [
        'file_ktp',
        'file_foto',
        'file_ijazah',
        'file_daftar_riwayat_hidup',
        'file_surat_bebas_penyalahgunaan_narkoba',
        'file_surat_lamaran',
        'file_dokumen_penunjang'

    ];

    public static function tableName()
    {
        return 'pendaftar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jabatan_id', 'nik', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'no_hp', 'pendidikan_terakhir', 'file_surat_lamaran', 'file_ktp', 'file_foto', 'file_ijazah', 'file_daftar_riwayat_hidup', 'file_surat_bebas_penyalahgunaan_narkoba', 'created_at'], 'required'],
            [['jabatan_id'], 'integer'],
            [['alamat'], 'string'],
            [['tanggal_lahir', 'created_at'], 'safe'],
            [['nik', 'no_hp'], 'string', 'max' => 16],
            [['nama', 'tempat_lahir', 'agama', 'pendidikan_terakhir'], 'string', 'max' => 64],
            [ $this->_berkas,'file',     'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 1024*1024*1, 'tooBig' => 'File maksimal berukuran 1MB'],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['nik'], 'unique'],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jabatan_id' => 'Formasi',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'no_hp' => 'No Hp',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'file_ktp' => 'File Ktp',
            'file_foto' => 'File Foto',
            'file_ijazah' => 'File Ijazah dan Transkrip',
            'file_daftar_riwayat_hidup' => 'File Daftar Riwayat Hidup',
            'file_surat_bebas_penyalahgunaan_narkoba' => 'File Surat Bebas Penyalahgunaan Narkoba',
            'created_at' => 'Created At',
        ];

    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
                foreach ($this->_berkas as $file) {
                    $this->upload($file);
               
            }
            
            return true;
        } else {
            return false;
        }
    }

    public function upload($fieldName)
    {
        $path = Yii::getAlias('@app') . '/web/document/';
        //s  die($fieldName);
        $image = UploadedFile::getInstance($this, $fieldName);
        if (!empty($image) && $image->size !== 0) {
            $fileNames = $fieldName . $this->nik . '.' . $image->extension;

            if ($image->saveAs($path . $fileNames)) {
                $this->attributes = [$fieldName => $fileNames];
                return true;
            } else {
                return false;
                $this->attributes = [$fieldName => $this->_old_file[$fieldName]];
            }
        } else {
            $this->attributes = [$fieldName => $this->_old_file[$fieldName]];
            return true;
        }
    }    /**
     * Gets query for [[Jabatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'jabatan_id']);
    }
}
