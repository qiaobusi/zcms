<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseCenterController;
use backend\models\Manager;
use backend\models\Role;
use backend\utils\CommonFunc;

use yii\data\Pagination;
use yii\web\Response;

class ManagerController extends BaseCenterController
{
		public $layout = false;
	
    public function actionIndex()
    {
    	$query = Manager::find();
    	$pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        
        $managers = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'managers' => $managers,
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
    				
    				$model = new Manager();
    				$model->load($data);
    				if ($model->validate()) {
    						$model->password = md5($model->password);
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
    		
    		$manager = Manager::findOne($id);
    		
    		return $this->render('edit', ['id' => $id, 'manager' => $manager]);
    }
    
    public function actionSave()
    {
    		if (Yii::$app->request->isAjax) {
    				Yii::$app->response->format = Response::FORMAT_JSON;
    				
    				$id = Yii::$app->request->post('id');
    				$data = Yii::$app->request->post();
    				
    				$model = Manager::findOne($id);
    				$model->load($data);
    				
    				if ($model->validate()) {
    						$model->password = md5($model->password);
    						
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
    				
    				$manager = Manager::findOne($id);
    				$result = $manager->delete();
    				if ($result) {
    						return ['status' => 1, 'info' => '删除成功', 'data' => null];
    				} else {
    						return ['status' => 0, 'info' => '删除失败', 'data' => null];
    				}
    		}
    }

    public function actionRole()
    {
            $id = Yii::$app->request->get('id');
            $manager = Manager::findOne($id);
            
            $query = Role::find();
            $roles = $query->orderBy('id')->all();
            
            $manager_roles = Yii::$app->db->createCommand('SELECT role_id FROM {{%manager_role}} WHERE manager_id = :manager_id')->bindValue(':manager_id', $id)->queryColumn();
            
            return $this->render('role', [
                'manager' => $manager,
                'roles' => $roles,
                'manager_roles' => $manager_roles
            ]);
    }
    
    public function actionSaveRole()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
             
            $post = Yii::$app->request->post();
            
            $manager_id = $post['manager_id'];
            $role_id = $post['role_id'];
            
            $data = [];
            foreach ($role_id as $v) {
                $one = [$manager_id, $v];
                array_push($data, $one);
            }
            
            $db = Yii::$app->db;
            
            $db->createCommand()->delete('{{%manager_role}}', 'manager_id = ' . $manager_id)->execute();
            $result = $db->createCommand()->batchInsert('{{%manager_role}}', ['manager_id', 'role_id'], $data)->execute();
            if ($result) {
                return ['status' => 1, 'info' => '保存成功', 'data' => null];
            } else {
                return ['status' => 0, 'info' => '保存失败', 'data' => null];
            }
        }
    }
   

}

?>
