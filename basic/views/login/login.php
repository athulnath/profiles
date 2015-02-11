<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

	<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign in </strong>
					</div>
					<div class="panel-body">
							    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">

								   <?= $form->field($model, 'email',  ['template' => '
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												{input}
											</div>
											<div>
													{error}
											</div>
												'])->textInput(['placeholder' => 'Email']) ?>

									<?= $form->field($model, 'password',  ['template' => '
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span> 
												{input}
											</div>
											<div>
													{error}
											</div>'])->passwordInput(['placeholder' => 'Password']) ?>
										
										<div class="form-group">
											<?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
										</div>
									</div>
								</div>
							</fieldset>
						<?php ActiveForm::end(); ?>
					</div>
					<div class="panel-footer ">
						Don't have an account! <a href="#" onClick=""> Sign Up Here </a>
					</div>
                </div>
			</div>
		</div>