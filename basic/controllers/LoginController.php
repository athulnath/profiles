<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;

class LoginController extends Controller
{
	public $layout = "headeronly";
	
	public function actionIndex()
	{
// 		if (!\Yii::$app->user->isGuest) {
// 			return $this->goHome();
// 		}
		
		
		
		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			Yii::trace("logged in");
			return $this->goBack();
		} else {
			return $this->render('login', [
					'model' => $model,
					]);
		}
	}
}