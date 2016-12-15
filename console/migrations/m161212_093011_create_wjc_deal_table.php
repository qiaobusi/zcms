<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wjc_deal`.
 */
class m161212_093011_create_wjc_deal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wjc_deal', [
            'id' => $this->primaryKey(),
        	'user_id' => $this->integer()->notNull()->comment('借款人'),
        	'name' => $this->string(255)->notNull()->comment('借款名称'),
        	'cate_id' => $this->integer()->notNull()->comment('借款分类'),
        	'type_id' => $this->integer()->notNull()->comment('借款用途'),
        	'agency_id' => $this->integer()->notNull()->comment('担保机构'),
        	'warrant' => $this->smallInteger(1)->notNull()->comment('担保范围：0无，1本金，2本金及利息'),
        	'description' => $this->text()->comment('简介'),
        	'is_effect' => $this->smallInteger(1)->defaultValue(1)->comment('有效性'),
        	'borrow_amount' => $this->decimal(10, 0)->notNull()->comment('借款总额'),
        	'repay_time' => $this->integer()->notNull()->comment('借款期限'),
        	'repay_time_type' => $this->smallInteger(1)->notNull()->comment('借款期限类型：0按天还款，1按月还款'),
        	'min_loan_money' => $this->decimal(10, 0)->notNull()->comment('最底投标额度'),
        	'max_loan_money' => $this->decimal(10, 0)->notNull()->comment('最高投标额度'),
        	'rate' => $this->decimal(10, 2)->notNull()->comment('年化利率'),
        	'is_recommend' => $this->smallInteger(1)->defaultValue(0)->comment('是否推荐'),
        	'start_time' => $this->integer()->comment('开始投资时间'),
        	'deal_status' => $this->smallInteger(1)->defaultValue(0)->comment('状态：0待等材料，1进行中，2满标，3流标，4还款中，5已还清'),
        	'enddate' => $this->integer()->comment('筹标期限'),
        	'services_fee' => $this->decimal(10, 0)->notNull()->comment('服务费率'),
        	'loantype' => $this->smallInteger(1)->notNull()->comment('还款方式：0等额本息，1付息还本，2到期本息'),
        	'seo_title' => $this->text()->comment('SEO标题'),
        	'seo_keyword' => $this->text()->comment('SEO关键词'),
        	'seo_description' => $this->text()->comment('SEO说明'),
        	'create_time' => $this->integer()->comment('添加时间'),
        	'update_time' => $this->integer()->comment('更新时间'),
        	'buy_count' => $this->integer()->defaultValue(0)->comment('投标人数'),
        	'load_money' => $this->decimal(10, 2)->defaultValue(0)->comment('已投标多少'),
        	'repay_money' => $this->decimal(10, 2)->defaultValue(0)->comment('还了多少'),
        	'success_time' => $this->integer()->comment('成功日期'),
        	'repay_start_time' => $this->integer()->comment('开始还款日'),
        	'last_repay_time' => $this->integer()->comment('最后一次还款日'),
        	'next_repay_time' => $this->integer()->comment('下次还款日'),
        	'bad_time' => $this->integer()->comment('流标时间'),		
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wjc_deal');
    }
}
