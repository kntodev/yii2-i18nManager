<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model kntodev\i18nmanager\models\LanguageCategory */

$this->title = $model->category;
$this->params['breadcrumbs'][] = ['label' => 'Language Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category',
            'base_language',
            'data:ntext',
        ],
    ]) ?>

    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-success" href="#" role="button">View Sourcemessage</a>
        </div>
        <div class="col-md-2">
            <a class="btn btn-success" href="#" role="button">New Translation</a>
        </div>
        <div class="col-md-4">
            <a class="btn btn-default" href="#" role="button">Link</a>
        </div>
    </div>
</div>
