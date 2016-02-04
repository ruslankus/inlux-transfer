<?php

const INPUT_LANGUAGE = 'en';
const DEFAULT_LANGUAGE = 'en';

return array(

    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

    'name'=>'Yii Testing',
    'defaultController'=>'pages',

    'sourceLanguage'=> INPUT_LANGUAGE,
    'language' => DEFAULT_LANGUAGE,

    // preloading 'log' component
    'preload'=>array('log'),

    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    'modules'=>array(
        'admin',
        'form',
        // uncomment the following to enable the Gii tool
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),

    'components'=>array(

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(

                'gii'=>'gii',
                'gii/<controller:\w+>'=>'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

                'admin' => 'admin/inlux/index',
                'admin/<controller:\w+>/<id:\d+>'=>'admin/<controller>/view',
                'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',
                'admin/<controller:\w+>/<action:\w+>/*'=>'admin/<controller>/<action>',
                
                'form' => 'form/card/index',
                'form/<controller:\w+>/<id:\d+>'=>'form/<controller>/view',
                'form/<controller:\w+>/<action:\w+>/<id:\d+>'=>'form/<controller>/<action>',
                'form/<controller:\w+>/<action:\w+>/*'=>'form/<controller>/<action>',

                '<language:\w{2}>/page/<id:\d+>/<title>' => 'pages/show',
                '<language:\w{2}>/page/home' => 'pages/index',

                '<language:\w{2}>' => 'pages/index',
                '<language:\w{2}>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<language:\w{2}>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<language:\w{2}>/<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',

            ),
        ),

        'request'=>array(
            'enableCookieValidation'=>true,
            'enableCsrfValidation'=>false,
        ),


        'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/site.db',
        ),
        
        'card_users'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/users.db',
            'class'=>'CDbConnection',
        ),
        
        'lit_numbers'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/lit_num.db',
            'class'=>'CDbConnection',
        ),
        'ops_log'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/ops_log.db',
            'class'=>'CDbConnection',
        ),



        'users'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=users',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'mysql',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),

        'arrington'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=arrington',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),

        'lmt'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=lmt',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),

        'lux'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=inlux',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'mysql',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),


        /*
        'users'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=alex_users',
            'emulatePrepare' => true,
            'username' => 'alex_users',
            'password' => '123pass',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),

        'arrington'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=alex_arrington',
            'emulatePrepare' => true,
            'username' => 'alex_arrington',
            'password' => '123pass',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),

        'lmt'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=alex_lmt',
            'emulatePrepare' => true,
            'username' => 'alex_lmt',
            'password' => '123pass',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),

        'lux'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=alex_inlux',
            'emulatePrepare' => true,
            'username' => 'alex_inlux',
            'password' => '123pass',
            'charset' => 'utf8',
            'class'=>'CDbConnection',
        ),
        */

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages

                array(
                    'class'=>'CWebLogRoute',
                ),

            ),
        ),
    ),

);