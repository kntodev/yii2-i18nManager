<?php

use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

?>

<?php $form = ActiveForm::begin(); ?>

<?= '<label class="control-label">Select Target Language</label>' ?>
<?= Select2::widget([
    'name' => 'target_language',
    'data' => $language_list,
    'options' => [
    	'multiple' => false,
    	'placeholder' => 'Select Language ...',
//    	'onchange' =>"test(this.value);"
    ]
]); ?>

<?php ActiveForm::end(); ?>