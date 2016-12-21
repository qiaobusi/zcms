<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseCenterController;
use backend\models\Deal;
use backend\models\DealCate;
use backend\models\DealType;
use backend\models\DealAgency;
use backend\utils\CommonFunc;

use yii\data\Pagination;
use yii\web\Response;

class DealController extends BaseCenterController
{
	public $layout = false;
	
	public function actionIndex()
	{
		$query = Deal::find();
		$pagination = new Pagination([
				'defaultPageSize' => 10,
				'totalCount' => $query->count(),
		]);
	
		$deals = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
	
		return $this->render('index', [
				'deals' => $deals,
				'pagination' => $pagination,
		]);
	}
	
	public function actionAdd()
	{
		$dealCates = DealCate::findAll(['is_effect' => 1]);
		
		$dealTypes = DealType::findAll(['is_effect' => 1]);
		
		$dealAgencys = DealAgency::findAll(['is_effect' => 1]);
		
		return $this->render('add', [
				'dealCates' => $dealCates,
				'dealTypes' => $dealTypes,
				'dealAgencys' => $dealAgencys,
		]);
	}
	
	public function actionInsert()
	{
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;
		
			$data = Yii::$app->request->post();
			if (!empty($data['Deal']['start_time'])) {
				$array = explode(' ', $data['Deal']['start_time']);
				$dateArray = explode('-', $array[0]);
				$timeArray = explode(':', $array[1]);
				
				$data['Deal']['start_time'] = mktime($timeArray[0], $timeArray[1], 0, $dateArray[1], $dateArray[2], $dateArray[0]);
			}
			
			$model = new Deal();
			$model->load($data);
			if ($model->validate()) {
				
				$model->create_time = time();
				$model->update_time = time();
				
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
	
	
	
}


?>