<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CostCalculator */

$this->title = 'New Language Category';
$this->params['breadcrumbs'][] = ['label' => 'Language Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>