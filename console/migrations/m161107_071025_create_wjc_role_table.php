<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_role`.
 */
class m161107_071025_create_wjc_role_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_role', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'time' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_role');
    }
}
