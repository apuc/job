<?php

use yii\db\Migration;

/**
 * Class m190416_140031_alter_keys
 */
class m190416_140031_alter_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('experience', '')
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190416_140031_alter_keys cannot be reverted.\n";

        return false;
    }

}
