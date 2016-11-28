<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%manager}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $avatar
 * @property integer $time
 */
class Manager extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%manager}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [	
        	['username', 'trim'],
            ['username', 'required', 'message' => '用户名称必须'],
            ['username', 'string', 'max' => 100, 'tooLong' => '用户名称太长'],
            ['username', 'unique', 'message' => '用户名称存在'],
            
            ['password', 'trim'],
            ['password', 'required', 'message' => '登陆密码必须'],
            ['password', 'string', 'min' => 6, 'max' => 32, 'tooShort' => '登陆密码长度6-16', 'tooLong' => '登陆密码长度6-16'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名称',
            'password' => '登陆密码',
            'time' => '添加时间',
        ];
    }
    
}
