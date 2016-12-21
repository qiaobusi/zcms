<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wjc_deal".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $cate_id
 * @property integer $type_id
 * @property integer $agency_id
 * @property integer $warrant
 * @property string $description
 * @property integer $is_effect
 * @property string $borrow_amount
 * @property integer $repay_time
 * @property integer $repay_time_type
 * @property string $min_loan_money
 * @property string $max_loan_money
 * @property string $rate
 * @property integer $is_recommend
 * @property integer $start_time
 * @property integer $deal_status
 * @property integer $enddate
 * @property string $services_fee
 * @property integer $loantype
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_description
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $buy_count
 * @property string $load_money
 * @property string $repay_money
 * @property integer $success_time
 * @property integer $repay_start_time
 * @property integer $last_repay_time
 * @property integer $next_repay_time
 * @property integer $bad_time
 */
class Deal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%deal}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['user_id', 'required', 'message' => '借款人ID必须'],
        	['user_id', 'integer', 'message' => '借款人ID为整数'],
        	//['user_id', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '借款人ID大于0'],
        	
        	['name', 'trim'],
        	['name', 'required', 'message' => '借款名称必须'],
        	['name', 'string', 'max' => 255, 'tooLong' => '借款名称太长'],
        		
        	['cate_id', 'required', 'message' => '借款分类必须'],
        	['cate_id', 'integer', 'message' => '借款分类为整数'],
        	//['cate_id', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '借款分类大于0'],
        		
        	['type_id', 'required', 'message' => '借款用途必须'],
        	['type_id', 'integer', 'message' => '借款用途为整数'],
        	//['type_id', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '借款用途大于0'],
        		
        	['agency_id', 'required', 'message' => '担保机构必须'],
        	['agency_id', 'integer', 'message' => '担保机构为整数'],
        	//['agency_id', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '担保机构大于0'],
        		
        	['warrant', 'required', 'message' => '担保范围必须'],
        	['warrant', 'in', 'range' => [0, 1, 2], 'message' => '担保范围错误'],
        		
        	['is_effect', 'required', 'message' => '有效性必须'],
        	['is_effect', 'in', 'range' => [0, 1], 'message' => '有效性错误'],
        		
        	['borrow_amount', 'required', 'message' => '借款金额必须'],
        	['borrow_amount', 'number', 'message' => '借款金额为数字'],
        	
        	['repay_time', 'required', 'message' => '借款期限必须'],
        	['repay_time', 'integer', 'message' => '借款期限为整数'],
        	//['repay_time', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '借款期限大于0'],
        		
        	['repay_time_type', 'required', 'message' => '借款期限类型必须'],
        	['repay_time_type', 'in', 'range' => [0, 1], 'message' => '借款期限类型错误'],
        		
        	['min_loan_money', 'required', 'message' => '最低投资金额必须'],
        	['min_loan_money', 'number', 'message' => '最低投资金额为数字'],
        	//['min_loan_money', 'compare', 'compareValue' => 100, 'operator' => '>=', 'message' => '借款期限大于等于100'],
        		
        	['max_loan_money', 'required', 'message' => '最高投资金额必须'],
        	['max_loan_money', 'number', 'message' => '最高投资金额为数字'],
        	//['max_loan_money', 'compare', 'compareValue' => 0, 'operator' => '>=', 'message' => '最高投资金额大于等于0'],
        	
        	['rate', 'required', 'message' => '年化利率必须'],
        	['rate', 'number', 'message' => '年化利率为数字'],
        	//['rate', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '年化利率大于0'],
        	//['rate', 'compare', 'compareValue' => 100, 'operator' => '<=', 'message' => '年化利率小于等于100'],
        	
        	['is_recommend', 'required', 'message' => '是否推荐必须'],
        	['is_recommend', 'in', 'range' => [0, 1], 'message' => '是否推荐错误'],
        		
        	['start_time', 'required', 'message' => '开始投资时间必须'],
        	['start_time', 'integer', 'message' => '开始投资时间为整数'],
        		
        	['deal_status', 'required', 'message' => '借款状态必须'],
        	['deal_status', 'in', 'range' => [0, 1, 2, 3, 4, 5], 'message' => '借款状态错误'],
        		
        	['enddate', 'required', 'message' => '筹款期限必须'],
        	['enddate', 'integer', 'message' => '筹款期限为整数'],
        	//['enddate', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '筹款期限大于0'],
        	
        	['services_fee', 'required', 'message' => '服务费率必须'],
        	['services_fee', 'number', 'message' => '服务费率为数字'],
        	//['services_fee', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => '服务费率大于0'],
        	//['services_fee', 'compare', 'compareValue' => 100, 'operator' => '<=', 'message' => '服务费率小于等于100'],
        	
        	['loantype', 'required', 'message' => '还款方式必须'],
        	['loantype', 'in', 'range' => [0, 1, 2], 'message' => '还款方式错误'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'cate_id' => 'Cate ID',
            'type_id' => 'Type ID',
            'agency_id' => 'Agency ID',
            'warrant' => 'Warrant',
            'description' => 'Description',
            'is_effect' => 'Is Effect',
            'borrow_amount' => 'Borrow Amount',
            'repay_time' => 'Repay Time',
            'repay_time_type' => 'Repay Time Type',
            'min_loan_money' => 'Min Loan Money',
            'max_loan_money' => 'Max Loan Money',
            'rate' => 'Rate',
            'is_recommend' => 'Is Recommend',
            'start_time' => 'Start Time',
            'deal_status' => 'Deal Status',
            'enddate' => 'Enddate',
            'services_fee' => 'Services Fee',
            'loantype' => 'Loantype',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'seo_description' => 'Seo Description',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'buy_count' => 'Buy Count',
            'load_money' => 'Load Money',
            'repay_money' => 'Repay Money',
            'success_time' => 'Success Time',
            'repay_start_time' => 'Repay Start Time',
            'last_repay_time' => 'Last Repay Time',
            'next_repay_time' => 'Next Repay Time',
            'bad_time' => 'Bad Time',
        ];
    }
}
