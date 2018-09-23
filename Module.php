<?php

namespace kntodev\i18nmanager;

use Yii;
use kntodev\i18nmanager\models\SourceMessage ;
use kntodev\i18nmanager\models\Message ;

/**
 * This is just an example.
 */
class Module extends \yii\base\Module
{
	public $controllerNamespace = 'kntodev\i18nmanager\controllers';

	public function actionIndex()
	{
		echo "string";
	}

	public function getSourceDataFunctionName($category)
	{
		# code...
	}
}
