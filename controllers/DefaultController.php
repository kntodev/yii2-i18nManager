<?php

namespace kntodev\i18nmanager\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kntodev\i18nmanager\models\SourceMessage ;
use kntodev\i18nmanager\models\LanguageCategory;

/**
 * Default controller for the `simplemessage` module
 */
class DefaultController extends Controller
{

    public $layout = "@app/views/layouts/main";

    //public function behaviors()
    //{
    //    return [
    //        'access' => [
    //            'class' => AccessControl::className(),
    //            'only' => ['delete', 'create'], 
    //            'rules' => [
    //                [
    //                    'allow' => false,
    //                    'verbs' => ['POST'],
    //                ],
    //                [
    //                    'allow' => true,
    //                    'actions' => ['delete', 'create'],
    //                    'roles' => ['Admin'],
    //                ],
    //            ],
    //        ],
    //        'verbs' => [
    //            'class' => VerbFilter::className(),
    //            'actions' => [
    //                'delete' => ['post'],
    //            ],
    //        ],
    //    ];
    //}


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $language_list = [
            'en' => 'en',
            'de' => 'de',
        ];
        $categories = $this->getCategories() ;

        return $this->render('index', [
            'categories' => $categories,
            'language_list' => $language_list,
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
