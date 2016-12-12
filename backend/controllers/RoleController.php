<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseCenterController;
use backend\models\Role;
use backend\models\Auth;
use backend\utils\CommonFunc;

use yii\data\Pagination;
use yii\web\Response;

class RoleController extends BaseCenterController
{
	public $layout = false;
	
	public function actionIndex()
	{
		$query = Role::find();
    		$pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        
        $roles = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'roles' => $roles,
            'pagination' => $pagination,
        ]);
	}
		
	public function actionAdd()
    {
    	return $this->render('add');
    }
    
    public function actionInsert()
    {
    	if (Yii::$app->request->isAjax) {
    		Yii::$app->response->format = Response::FORMAT_JSON;
    		 
    		$data = Yii::$app->request->post();
    	
    		$model = new Role();
    		$model->load($data);
    		if ($model->validate()) {
    			$model->time = time();
    	
    			$result = $model->insert();
    	
    			if ($result) {
    				return ['status' => 1, 'info' => '保存成功', 'data' => null];
    			} else {
    				$error = $model->firstErrors;
    				$info = CommonFunc::getErrorInfo($error);
    				return ['status' => 0, 'info' => $info, 'data' => 'aaaaa'];
    			}
    		} else {
    			$error = $model->firstErrors;
    			$info = CommonFunc::getErrorInfo($error);
    			return ['status' => 0, 'info' => $info, 'data' => null];
    		}
    	}
    }
    
    public function actionEdit()
    {
    	$id = Yii::$app->request->get('id');
    	
    	$role = Role::findOne($id);
    	
    	return $this->render('edit', ['id' => $id, 'role' => $role]);
    }
    
    public function actionSave()
    {
    	if (Yii::$app->request->isAjax) {
    		Yii::$app->response->format = Response::FORMAT_JSON;
    
    		$id = Yii::$app->request->post('id');
    		$data = Yii::$app->request->post();
    
    		$model = Role::findOne($id);
    		$model->load($data);
    
    		if ($model->validate()) {
    
    			$result = $model->update();
    			
    			if ($result) {
    				return ['status' => 1, 'info' => '修改成功', 'data' => null];
    			} else {
    				$error = $model->firstErrors;
    				$info = CommonFunc::getErrorInfo($error);
    				return ['status' => 0, 'info' => $info, 'data' => 'aaaaa'];
    			}
    		} else {
    			$error = $model->firstErrors;
    			$info = CommonFunc::getErrorInfo($error);
    			return ['status' => 0, 'info' => $info, 'data' => null];
    		}
    	}
    }
    
    public function actionDel()
    {
    	if (Yii::$app->request->isAjax) {
    		Yii::$app->response->format = Response::FORMAT_JSON;
    		 
    		$id = Yii::$app->request->get('id');
    
    		$role = Role::findOne($id);
    		$result = $role->delete();
    		if ($result) {
    			return ['status' => 1, 'info' => '删除成功', 'data' => null];
    		} else {
    			return ['status' => 0, 'info' => '删除失败', 'data' => null];
    		}
    	}
    }
    
    public function actionAuth()
    {
    	$id = Yii::$app->request->get('id');
    	$role = Role::findOne($id);
    	
    	$query = Auth::find();
    	$auths = $query->orderBy('id')->all();
    	
    	$role_auths = Yii::$app->db->createCommand('SELECT auth_id FROM {{%role_auth}} WHERE role_id = :role_id')->bindValue(':role_id', $id)->queryColumn();
    	
    	return $this->render('auth', [
    		'role' => $role,
    		'auths' => $auths,
    		'role_auths' => $role_auths
    	]);
    }
    
    public function actionSaveAuth()
    {
    	if (Yii::$app->request->isAjax) {
    		Yii::$app->response->format = Response::FORMAT_JSON;
    		 
    		$post = Yii::$app->request->post();
    		
    		$role_id = $post['role_id'];
    		$auth_id = $post['auth_id'];
    		
    		$data = [];
    		foreach ($auth_id as $v) {
    			$one = [$role_id, $v];
    			array_push($data, $one);
    		}
    		
    		$db = Yii::$app->db;
    		
    		$db->createCommand()->delete('{{%role_auth}}', 'role_id = ' . $role_id)->execute();
    		$result = $db->createCommand()->batchInsert('{{%role_auth}}', ['role_id', 'auth_id'], $data)->execute();
    		if ($result) {
    			return ['status' => 1, 'info' => '保存成功', 'data' => null];
    		} else {
    			return ['status' => 0, 'info' => '保存失败', 'data' => null];
    		}
    	}
    }
		
		
}


?>