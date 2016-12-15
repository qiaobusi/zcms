<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wjc_deal_agency".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_effect
 * @property integer $time
 */
class DealAgency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%deal_agency}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['name', 'trim'],
        	['name', 'required', 'message' => '担保机构必须'],
        	['name', 'string', 'max' => 255, 'tooLong' => '担保机构太长'],
        	['name', 'unique', 'message' => '担保机构存在'],
        		 
        	['is_effect', 'required', 'message' => '有效性必须'],
        	['is_effect', 'integer', 'message' => '有效性错误'],
        	['is_effect', 'in', 'range' => [0, 1], 'message' => '有效性错误'],
        ];
    }

}
