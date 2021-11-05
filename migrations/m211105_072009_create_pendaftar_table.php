<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pendaftar}}`.
 */
class m211105_072009_create_pendaftar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pendaftar}}', [
            'id' => $this->primaryKey(),
            'jabatan_id' => $this->integer()->notNull(),
            'nik' => $this->string(16)->notNull()->unique(),
            'nama' => $this->string(64)->notNull(),
            'alamat' => $this->text()->notNull(),
            'tempat_lahir' => $this->string(64)->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'jenis_kelamin' => $this->string(1)->notNull(),
            'agama' => $this->string(64)->notNull(),
            'no_hp' => $this->string(16)->notNull(),
            'pendidikan_terakhir'   => $this->string(64)->notNull(),         
            'file_ktp'  => $this->string(64)->notNull(),
            'file_foto' => $this->string(64)->notNull(),
            'file_ijazah' => $this->string(64)->notNull(),
            'file_daftar_riwayat_hidup' => $this->string(64)->notNull(),  
            'file_surat_bebas_penyalahgunaan_narkoba' => $this->string(64)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            


                      
            

        ]);
        $this->createIndex('idx-pendaftar-jabatan_id', 'pendaftar', 'jabatan_id');
        $this->addForeignKey('fk-pendaftar-jabatan_id', 'pendaftar', 'jabatan_id', 'jabatan', 'id', 'CASCADE', 'CASCADE');
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pendaftar}}');
    }
}
