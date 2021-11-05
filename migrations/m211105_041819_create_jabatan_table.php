<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jabatan}}`.
 */
class m211105_041819_create_jabatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jabatan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(100)->notNull(),
            'jumlah' => $this->integer()->notNull(),
            'kualifikasi' => $this->string(100)->notNull(),
            'penempatan'    => $this->string(100)->notNull(),    

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jabatan}}');
    }
}
