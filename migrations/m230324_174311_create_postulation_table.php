<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%postulation}}`.
 */
class m230324_174311_create_postulation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%postulation}}', [
            'id'         => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'email'      => $this->string()->notNull()->unique(),
        ]);

        $this->createIndex(
            'idx-postulation-program_id',
            'postulation',
            'program_id'
        );

        $this->addForeignKey(
            'fk-postulation-program_id',
            'postulation',
            'program_id',
            'program',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-postulation-program_id',
            'postulation'
        );

        $this->dropIndex(
            'idx-postulation-program_id',
            'postulation'
        );

        $this->dropTable('{{%postulation}}');
    }
}
