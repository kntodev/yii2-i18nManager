<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use richardfan\widget\JSRegister;

/* @var $this yii\web\View */
/* @var $model kntodev\i18nmanager\models\SourceMessage */

$this->title = 'Source Messages for : '.$category;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
                
        Modal::begin([
                'header' => '<h4>Create new Sourcemessage for '.$category.'</h4>',
                'id'     => 'sm_create_modal',
                'size'   => 'model-lg',
        ]);
    ?>
        <input type="hidden" id="category" value="<?= $category ?>">
        <div id='modelContent'>
        </div>
    <?php
        
        Modal::end();
                
    ?>
    <?= Html::button('Create new Sourcemessage with raw Text', ['id' => 'modelButtonraw', 'class' => 'btn btn-success']) ?>

    <?= Html::button('Create new Sourcemessage with Html Code', ['id' => 'modelButtonhtml', 'class' => 'btn btn-success']) ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'category',
            'message:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php JSRegister::begin(); ?>
    <script>
    $(function(){
        $('#modelButtonraw').click(function(){
            $.get(  "createajax", { category: document.getElementById("category").value, mode: "raw" } , function( data ) {
                $( "#modelContent" ).html( data );
                $('#sm_create_modal').modal('show');
            });
            
        });
        $('#modelButtonhtml').click(function(){
            $.get(  "createajax", { category: document.getElementById("category").value, mode: "html" } , function( data ) {
                $( "#modelContent" ).html( data );
                $('#sm_create_modal').modal('show');
            });
            
        });
    });
    </script>
    <?php JSRegister::end(); ?>

</div>

