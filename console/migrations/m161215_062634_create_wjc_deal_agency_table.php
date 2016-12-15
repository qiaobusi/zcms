<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_deal_agency`.
 */
class m161215_062634_create_wjc_deal_agency_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_deal_agency', [
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
        $this->dropTable('wjc_deal_agency');
    }
}
