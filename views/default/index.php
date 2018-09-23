<?php

use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Select Category';
echo "<pre>";
print_r($categories);
echo "</pre>";

?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= '<label class="control-label">Language Categories</label>' ?>
    </div>
    <div class="col-md-6">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= Select2::widget([
            'name' => 'categories',
            'id' => 'categories',
            'data' => $categories,
            'options' => [
                'multiple' => false,
                'placeholder' => 'Select Category ...',
        //      'onchange' =>"test(this.value);"
            ]
        ]); ?>
    </div>
  <div class="col-md-6">
      <?= Html::a('Create new Language Category', ['/translation/default/create'], ['class'=>'btn btn-primary']) ?>
  </div>
</div>
<?= '<label class="control-label">Select Target Language</label>' ?>
<?= Select2::widget([
    'name' => 'target_language',
    'data' => $language_list,
    'options' => [
        'multiple' => false,
        'placeholder' => 'Select Language ...',
        'onchange' =>"test(this.value);"
    ]
]); ?>
<?php ActiveForm::end(); ?>

<div id="categoryIndex">
	
</div>
<script type="text/javascript">
	function test(value) {
        
        var category = document.getElementById("categories").value ;
        if (category != '') {
//            alert(document.getElementById("categories").value);
            $.get( "https://develop.duebeck-it.eu/translation/default/getcategory", { id: category, target_language: value } )
                .done(function( data ) {
                    $( "#categoryIndex" ).html(data);
                });
            }
	}
</script>
