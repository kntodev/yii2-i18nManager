<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kntodev\i18nmanager\models\LanguageCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Language Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Language Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'category',
            [
                'attribute'=>'category',
//                'label' => 'category',
                'content' => function($model) {
                    $name = $model->category;
                    $url = Url::to(['sourcemessage/view', 'category' => $model->category]);
                    return Html::a($model->category, $url, ['class' => 'btn btn-success btn-xs', 'data-toggle' => "tooltip", 'title' => "View Sourcemessages of ".$model->category, 'data-pjax' => 0]);
                }
            ],
            'base_language',
            //'data:ntext',
            [
                'attribute'=>'data',
                'content' => function($model) {
                    $createurl = Url::to(['message/create', 'category' => $model->category]);
                    $data = json_decode($model->data, false) ;
                    $output = '';
                    if ($data) {
                        foreach ($data as $key => $value) {
                            $url = Url::to(['message/update', 'category' => $model->category, 'language' => $key]);
                            $output .= Html::a($key, $url, ['class' => 'btn btn-success btn-xs', 'data-toggle' => "tooltip", 'title' => "Edit Translation for ".$key, 'data-pjax' => 0]).' ';
                        }
                    }
                    $output .= '<br><br>'.Html::a("Create Translation for ".$model->category, $createurl, ['class' => 'btn btn-success btn-xs', 'data-toggle' => "tooltip", 'title' => "Create Translation for ".$model->category, 'data-pjax' => 0]);
                    //die();
                    return $output;
                }
            ],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php

?>