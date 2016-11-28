<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_manager_role`.
 */
class m161117_011321_create_wjc_manager_role_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_manager_role', [
            'id' => $this->primaryKey(),
        	'manager_id' => $this->integer()->notNull(),
        	'role_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_manager_role');
    }
}
