<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wjc_deal_cate".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_effect
 * @property integer $time
 */
class DealCate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%deal_cate}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['name', 'trim'],
        	['name', 'required', 'message' => '借款分类必须'],
        	['name', 'string', 'max' => 255, 'tooLong' => '借款分类太长'],
        	['name', 'unique', 'message' => '借款分类存在'],
        		
        	['is_effect', 'required', 'message' => '有效性必须'],
        	['is_effect', 'integer', 'message' => '有效性错误'],
        	['is_effect', 'in', 'range' => [0, 1], 'message' => '有效性错误'],
        ];
    }

}
