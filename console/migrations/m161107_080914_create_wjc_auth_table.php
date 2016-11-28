<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_auth`.
 */
class m161107_080914_create_wjc_auth_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_auth', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'label' => $this->string(100)->notNull()->unique(),
            'url' => $this->string(100)->notNull()->unique(),
            'time' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_auth');
    }
}
