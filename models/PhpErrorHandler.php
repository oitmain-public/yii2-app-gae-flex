<?php

namespace app\models;

use yii\web\ErrorHandler;

class PhpErrorHandler extends ErrorHandler
{

    /**
     * Register this error handler.
     */
    public function register()
    {
        ini_set('display_errors', true);
        error_reporting(E_ALL);
    }

}
