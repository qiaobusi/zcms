<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;

class IndexController extends Controller
{
	public function actionIndex()
	{
		echo 'index';
	}

	public function actionDb()
	{
		$query = new Query();

		$test = $query->select(['id', 'title', 'content'])
			->from('wjc_test')
			->all();
		var_dump($test);
	}

}


?>