<?php
use yii\helpers\Html;
?>

<p>You have entered following informations</p>
<ul>
 <li><label>Name</label> : <?php echo Html::encode($model->name); ?></li>
 <li><label>Email</label>: <?php echo Html::encode($model->email); ?></li>
</ul>
