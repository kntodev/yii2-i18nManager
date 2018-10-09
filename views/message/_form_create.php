<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\tinymce\TinyMce;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model kntodev\i18nmanager\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	<?= $form->field($model, 'language')->widget(Select2::classname(), [
	    'data' => $newlanguage,
	    'options' => ['placeholder' => 'Select a language ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]); ?>

	<table class="table table-bordered table-striped">
	    <thead>
	    	<tr>
	        	<th>#</th>
	        	<th><?= 'Source Message' ?></th>
	        	<th><?= $model->getAttributeLabel('translation') ?></th>
	      	</tr>
	    </thead>
	    <tbody>
	    <?php
	    foreach ($sourcemodel as $value) {
	    	?>
	    	<tr>
	    		<td><?= $value->id ; ?></td>
	    		<td><?= $value->message; ?></td>
	    		<td>
	    			<?= $form->field($model, 'translation')->textarea([
	    				'rows' => '6',
	    				'name'=>'translation['.$value->id.']',
	    			])->label(false) ?>
	    		</td>
	    	</tr>
	    	<?php
	    }
	    ?>
	    </tbody>
	</table>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
