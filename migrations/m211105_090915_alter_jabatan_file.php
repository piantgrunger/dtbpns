<?php

use yii\db\Migration;

/**
 * Class m211105_090915_alter_jabatan_file
 */
class m211105_090915_alter_jabatan_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pendaftar', 'file_surat_lamaran', $this->string(64));
        $this->addColumn('pendaftar', 'file_dokumen_penunjang', $this->string(64));    


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211105_090915_alter_jabatan_file cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211105_090915_alter_jabatan_file cannot be reverted.\n";

        return false;
    }
    */
}
