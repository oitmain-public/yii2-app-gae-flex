<?php

// Check if application is running on a Google App Engine
// Following functions from Google Cloud PHP library may be used but has more overhead
// (https://googlecloudplatform.github.io/google-cloud-php/#/)
// AppIdentityCredentials::onAppEngine()
// GCECredentials::onAppEngineFlexible()
// GCECredentials::onGce() - 300ms timeout delay
define('IS_GAE', !empty($_SERVER['APPLICATION_ID']) || !empty($_SERVER['GAE_SERVICE']));

// Workaround for bug https://github.com/google/google-auth-library-php/issues/188
if (!empty($_SERVER['GAE_INSTANCE'])) {
    $_SERVER['GAE_VM'] = $_SERVER['GAE_INSTANCE'];
}

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
