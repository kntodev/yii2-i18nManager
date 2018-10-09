<?php

namespace kntodev\i18nmanager\controllers;

use Yii;
use kntodev\i18nmanager\models\LanguageCategory;
use kntodev\i18nmanager\models\LanguageCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Default controller for the `simplemessage` module
 */
class DefaultController extends Controller
{

    public $layout = "@app/views/layouts/main";

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LanguageCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new SourceMessage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionGetcategory($id, $target_language)
    {
        echo $id.'<br>'.$target_language;

        //return $this->renderAjax('show', [
        //    'language_list' => $language_list,
        //]);
    }

    private function getCategories()
    {
        $query = SourceMessage::find()
        ->select('id, category')->asArray()->all();

        $rows = ArrayHelper::map($query, 'id', 'category') ;
        return array_unique($rows) ;
    }
}
