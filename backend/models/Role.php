<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $time
 */
class Role extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required', 'message' => '角色名称必须'],
            ['name', 'string', 'max' => 100, 'tooLong' => '角色名称太长'],
            ['name', 'unique', 'message' => '角色名称存在'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '角色名称',
            'time' => '添加时间',
        ];
    }
    
    public function getAuths()
    {
    	return $this->hasMany(Auth::className(), ['id' => 'auth_id'])->viaTable('role_auth', ['role_id' => 'id']);
    }

}
