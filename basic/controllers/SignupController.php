<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SignupForm;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;

class SignupController extends Controller
{
	public $layout = "headeronly";

	public function actionIndex()
	{
		$signupForm = new SignupForm();
		if($signupForm->load(Yii::$app->request->post()))
		{
			if(!$signupForm->isUserExist($signupForm->email))
			{
				$signupForm->registerData();
				return $this->render("verificationMessage", ['email' => $signupForm->email]);
			}
			else
			{
				return $this->render("alreadySignedup", ['email' => $signupForm->email]);
			}
		}
		
		return $this->render('index', ['model' => $signupForm]);
	}
	
	public function actionActivate($key, $account)
	{
		$signupForm = new SignupForm();
		if($signupForm->activate($key, $account))
		{
			return $this->render("verificationSuccess");
		}
		else 
		{
			throw new BadRequestHttpException();
		}
	}
	
	public function actionTest()
	{
		return $this->render("verificationSuccess");
	}
	
}