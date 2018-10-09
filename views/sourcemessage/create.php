<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kntodev\i18nmanager\models\SourceMessage */

$this->title = 'Create Source Message';
$this->params['breadcrumbs'][] = ['label' => 'Source Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mode' => $mode,
        'category' => $category,
    ]) ?>

</div>
