<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->params['appname'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => '<span class="glyphicon glyphicon-cog"></span> '
                        . Html::encode('Settings'),
                        'items' => [
                            ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">Dropdown Header</li>',
                            ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                        ],
                    ],
                    Yii::$app->user->isGuest ?
                            ['label' => '<span class="glyphicon glyphicon-user"></span> Login', 'url' => ['/site/login']] :
                            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                ],
            ]);

            NavBar::end();
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        
                        <div class="profile-img">
                            <?php echo Html::img('@web/images/prof.gif', ['alt' => 'profile-image', 'width' => '125px', 'height' => '125px']); ?>    
                        </div>
                        
                        
                        <div class="sidebar-nav">
                            <div class="well">
                                <ul class="nav ">
                                    <li class="nav-header">Sidebar</li>
                                    <li class="active"><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li class="nav-header">Sidebar</li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li class="nav-header">Sidebar</li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                    <li><a href="#">Link</a>
                                    </li>
                                </ul>
                            </div>
                            <!--/.well -->
                        </div>
                        <!--/sidebar-nav-fixed -->
                    </div>
                    <!--/span-->
                    <div class="col-md-8">
                        <?php echo  $content ?>
                    </div>
                    <!--/span-->
                    <!--/span-->
                </div>
                <!--/row-->

            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy;  <?= Yii::$app->params['appname'] . " " . date('Y') ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
