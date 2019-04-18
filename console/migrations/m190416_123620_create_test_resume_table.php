<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test_resume`.
 */
class m190416_123620_create_test_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test_resume', [
            'id' => $this->primaryKey(),
            'employment_type_id' => $this->integer(11),
            'title' => $this->string(),
            'first_name' => $this->string(),
            'second_name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'image_url' => $this->string(),
            'min_salary' => $this->decimal(10,2),
            'max_salary' => $this->decimal(10,2),
            'city' => $this->string(),
            'description' => $this->text(),
            'skype' => $this->string(),
            'instagram' => $this->string(),
            'facebook' => $this->string(),
            'vk' => $this->string(),
            'status' => $this->integer(2)->defaultValue(1),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test_resume');
    }
}
