<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\select2\Select2;
use richardfan\widget\JSRegister;
use yii\web\View ;

/* @var $this yii\web\View */
/* @var $model kntodev\i18nmanager\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php 
        $url_params = Yii::$app->request->get();
    	$form = ActiveForm::begin([
    		'action' => 'update?category='.$url_params['category'].'&language='.$url_params['language'],
    		'options' => [
    			'method' => 'post'
    		]
    	]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

        <?php

        if ($editor == "TRUE") {
        	$target_url = ['update' , 'category' => $url_params['category'], 'language' => $url_params['language'], 'editor' => 'FALSE'];
        	$buttonText = "Switch to PLAIN Text Editor";
        } elseif ($editor == 'FALSE') {
        	$target_url = ['update' , 'category' => $url_params['category'], 'language' => $url_params['language'], 'editor' => 'TRUE'];
        	$buttonText = "Switch to HTML Text Editor";
        }
        ?>
        <?= Html::a($buttonText, $target_url, ['class' => 'btn btn-primary']) ?>
    </div>

	<?= 'Target Language : '.$header->language; ?>

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
	foreach ($data as $key => $value) {
		//echo $key.' => <br>';
		//print_r($value);
		//echo "<br>--------------------<br>";
		?>
	    	<tr>
	    		<td><?= $key ; ?></td>
	    		<td><?= $value->sourcemessage; ?></td>
	    		<td>
	    			<?php
	    			if ($editor == "TRUE") {
	    				?>
			            <?= $form->field($model, 'translation')->label(false)->widget(TinyMce::className(), [
			                'options' => [
			                	'rows' => 6,
				                'name' =>'translation['.$key.']',
					    		'value' => $value->translation ,
			                ],
			                'language' => 'de',
			                'clientOptions' => [
				                'force_br_newlines' => false,
				                'force_p_newlines' => false,
				                'forced_root_block' => false,
			                    'plugins' => [
			                        "advlist autolink lists link charmap print preview anchor",
			                        "searchreplace visualblocks code fullscreen",
			                        "insertdatetime media table contextmenu paste"
			                    ],
			                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |  fontsizeselect"
			                ]
			            ]);?>
	    				<?php
	    			} elseif ($editor == 'FALSE') {
	    				?>
	    				<?= $form->field($model, 'translation')->textarea([
	    					'rows' => '6',
				            'name' =>'translation['.$key.']',
					    	'value' => $value->translation ,
	    				])->label(false) ?>
	    				<?php
	    			}
	    			?>
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
<?php
if ($editor == "TRUE") {
	$this->registerJs('
	    tinyMCE.init({
	        mode: "textareas",
	        forced_root_block : false,
	    });
	', View::POS_END);
}
?>
