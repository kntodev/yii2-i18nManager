<?php

namespace kntodev\i18nmanager;

/**
 * This is just an example.
 */
class Module extends \yii\base\Module
{
	public $controllerNamespace = 'kntodev\i18nmanager\controllers';

    public function run()
    {
        return "Hello!";
    }
}
