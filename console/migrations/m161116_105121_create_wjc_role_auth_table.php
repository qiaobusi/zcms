<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_role_auth`.
 */
class m161116_105121_create_wjc_role_auth_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_role_auth', [
            'id' => $this->primaryKey(),
        	'role_id' => $this->integer()->notNull(),
        	'auth_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_role_auth');
    }
}
