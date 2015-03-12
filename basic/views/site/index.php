<?php
/* @var $this yii\web\View */

use app\components\myprofile\PostViewWidget;

$this->title = 'My Yii Application';
?>

<?php
echo PostViewWidget::widget(['message' => 'heavvvvy', 'header' => 'hey!!!']);
?>

<div class="jumbotron">
    <h2>Create a profile</h2>
    <div>
        Please select a profile or create a profile as you wish 
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Profile A <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#">Profile B</a></li>
            <li><a href="#">Profile C</a></li>
            <li><a href="#">Profile D</a></li>
        </ul>
    </div>


    <h3>OR</h3>

    <div>
        <input type="text" value="Enter profile name"/>    
    </div>

    <br>
    
    <div>
        <button class="btn btn-primary"> Create </button>
    </div>


</div>

<div class="row">
    <div class="col-md-6 pull-left">
        <?php
            echo PostViewWidget::widget(['message' => 'heavvvvy', 'header' => 'hey!!!']);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 pull-right">
        <?php
            echo PostViewWidget::widget(['message' => 'heavvvvy', 'header' => 'hey!!!']);
        ?>
    </div>
</div>




