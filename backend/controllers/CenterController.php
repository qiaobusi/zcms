<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseCenterController;

class CenterController extends BaseCenterController
{
	public $layout = false;
	
	public function actionIndex()
	{
		return $this->render('index');
	}
}


?>