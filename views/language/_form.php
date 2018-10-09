<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model kntodev\i18nmanager\models\LanguageCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="language-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_language')->widget(Select2::classname(), [
	    'data' => json_decode($model->languages),
	    'options' => ['placeholder' => 'Select a language ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]); ?>


    <?php // echo $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
