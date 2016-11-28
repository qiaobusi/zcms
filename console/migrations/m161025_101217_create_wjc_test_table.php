<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_test`.
 */
class m161025_101217_create_wjc_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_test', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->text()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_test');
    }
}
