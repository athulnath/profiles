<?php
$params = require (__DIR__ . '/params.php');

$config = [
    'id' => 'myprofile',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Kh3D9kzTrw_7qm5u5_tb-HRNkJN4YBKC',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\activeRecords\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
        	'class' => 'yii\swiftmailer\Mailer',
        	'useFileTransport' => false,//set this property to false to send mails to real email addresses
        //comment the following array to send mail using php's mail function
        	'transport' => [
        			'class' => 'Swift_SmtpTransport',
            		'host' => 'smtp.gmail.com',
                    'username' => 'testmyapps321@gmail.com',
            		'password' => 'changesudome',
                    'port' => '587',
                    'encryption' => 'tls',
                    ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'mytime' => function(){
        	return time();
        }
    ],
    'params' => $params,
]
;

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config ['bootstrap'] [] = 'debug';
	$config ['modules'] ['debug'] = 'yii\debug\Module';
	
	$config ['bootstrap'] [] = 'gii';
	$config ['modules'] ['gii'] = [ 
			'class' => 'yii\gii\Module',
			'allowedIPs' => [ 
					'127.0.0.1' 
			] 
	];
}

return $config;
