<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseCenterController;
use backend\models\DealCate;
use backend\utils\CommonFunc;

use yii\data\Pagination;
use yii\web\Response;

class DealCateController extends BaseCenterController
{
	public $layout = false;
	
	public function actionIndex()
	{
		$query = DealCate::find();
		$pagination = new Pagination([
				'defaultPageSize' => 10,
				'totalCount' => $query->count(),
		]);
	
		$dealCates = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
	
		return $this->render('index', [
				'dealCates' => $dealCates,
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
	
			$model = new DealCate();
			$model->load($data);
			if ($model->validate()) {
				$model->time = time();
	
				$result = $model->insert();
	
				if ($result) {
					return ['status' => 1, 'info' => '保存成功', 'data' => null];
				} else {
					$error = $model->firstErrors;
					$info = count($error) > 0 ? CommonFunc::getErrorInfo($error) : '保存失败';
					return ['status' => 0, 'info' => $info, 'data' => null];
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
	
		$dealCate = DealCate::findOne($id);
	
		return $this->render('edit', ['id' => $id, 'dealCate' => $dealCate]);
	}
	
	public function actionSave()
	{
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$id = Yii::$app->request->post('id');
			$data = Yii::$app->request->post();
	
			$model = DealCate::findOne($id);
			$model->load($data);
	
			if ($model->validate()) {
				
				$result = $model->update();
	
				if ($result) {
					return ['status' => 1, 'info' => '修改成功', 'data' => null];
				} else {
					$error = $model->firstErrors;
					$info = count($error) > 0 ? CommonFunc::getErrorInfo($error) : '修改失败';
					return ['status' => 0, 'info' => $info, 'data' => null];
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
	
			$dealCate = DealCate::findOne($id);
			$result = $dealCate->delete();
			if ($result) {
				return ['status' => 1, 'info' => '删除成功', 'data' => null];
			} else {
				return ['status' => 0, 'info' => '删除失败', 'data' => null];
			}
		}
	}
	
}


?>