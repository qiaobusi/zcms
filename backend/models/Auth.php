<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%auth}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property string $url
 * @property integer $time
 */
class Auth extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required', 'message' => '权限名称必须'],
            ['name', 'string', 'max' => 100, 'tooLong' => '权限名称太长'],
            ['name', 'unique', 'message' => '权限名称存在'],
            
            ['label', 'trim'],
            ['label', 'required', 'message' => '权限标签必须'],
            ['label', 'string', 'max' => 100, 'tooLong' => '权限标签太长'],
            ['label', 'unique', 'message' => '权限标签存在'],
            
            ['url', 'trim'],
            ['url', 'required', 'message' => '权限链接必须'],
            ['url', 'string', 'max' => 100, 'tooLong' => '权限链接太长'],
            ['url', 'unique', 'message' => '权限链接存在'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '权限名称',
            'label' => '权限标签',
            'url' => '权限链接',
            'time' => '添加时间',
        ];
    }
}
