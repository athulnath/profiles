<?php
use yii\helpers\Html;
use app\components\HelloWidget;
use yii\helpers\Url;
use app\components\Foo;
?>

<?= Html::encode($message) ?>

<?php HelloWidget::begin(); ?>
	this is my content :)
<?php HelloWidget::end(); ?>

<?php 
	$object = new Foo();
	$object->label = "   OK";
	echo "          OK";	

?>