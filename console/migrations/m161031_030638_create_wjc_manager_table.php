<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_manager`.
 */
class m161031_030638_create_wjc_manager_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_manager', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(32)->notNull(),
            'time' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_manager');
    }
}
