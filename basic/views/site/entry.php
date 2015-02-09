<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\EntryForm */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
	<?php echo $form->field($model, 'name')->label("Please enter Name"); ?>
	<?php echo $form->field($model, 'email')->label("please enter email"); ?>
	<div class="form-group">
		<?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>
	</div>
<?php ActiveForm::end(); ?>

