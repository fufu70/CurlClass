<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../vendor/yiisoft/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
// require all src files
$files = glob(dirname(__FILE__).'/../src/*.php');
$composer_files = glob(dirname(__FILE__) . '/../vendor/fufu70/reflection-class/src/*.php');

$files = array_merge($files, $composer_files);

foreach ($files as $file) {
    require_once($file);   
}


Yii::createWebApplication($config);