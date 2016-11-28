<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseCenterController;
use backend\models\Auth;
use backend\utils\CommonFunc;

use yii\data\Pagination;
use yii\web\Response;

class AuthController extends BaseCenterController
{
		public $layout = false;
	
    public function actionIndex()
    {
    		$query = Auth::find();
    		$pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        
        $auths = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'auths' => $auths,
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
    				
    				$model = new Auth();
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
    		
    		$auth = Auth::findOne($id);
    		
    		return $this->render('edit', ['id' => $id, 'auth' => $auth]);
    }
    
}



?>