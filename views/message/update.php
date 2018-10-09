<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kntodev\i18nmanager\models\Message */

$this->title = 'Update Message: ' . $header->category.' => '.$header->language ;
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
    	'header' => $header,
    	'data' => $data,
        'model' => $model,
        'editor' => $editor,
    ]) ?>

</div>
