<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_deal_cate`.
 */
class m161212_091427_create_wjc_deal_cate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_deal_cate', [
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
        $this->dropTable('wjc_deal_cate');
    }
}
