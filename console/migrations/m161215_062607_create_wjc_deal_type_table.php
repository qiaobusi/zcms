<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_deal_type`.
 */
class m161215_062607_create_wjc_deal_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_deal_type', [
            'id' => $this->primaryKey(),
        	'name' => $this->string(255)->notNull(),
        	'is_effect' => $this->smallInteger(1)->defaultValue(1),
        	'time' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_deal_type');
    }
}
