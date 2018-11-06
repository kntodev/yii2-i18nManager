<?php

namespace kntodev\i18nmanager\controllers;

use Yii;
use kntodev\i18nmanager\models\Message;
use kntodev\i18nmanager\models\MessageSearch;
use kntodev\i18nmanager\models\LanguageCategory;
use kntodev\i18nmanager\models\SourceMessage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param integer $id
     * @param string $language
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $language)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $language),
        ]);
    }

    /**
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($category)
    {
        $basemodel = $this->findBase($category);
        $newlanguage = $this->filterlanguage($basemodel);

        $model = new Message();
        $sourcemodel = $this->getSource($category);

        if ($post = Yii::$app->request->post()) {
            $message = $post['Message'];

            foreach ($post['translation'] as $key => $value) {
                if ($value != '') {
                    $targetmodel = new Message;
                    $targetmodel->id = $key;
                    $targetmodel->language = $message['language'];
                    $targetmodel->translation = $value;
                    if ($targetmodel->save()) {
                        $this->addlanguage($basemodel,$message['language']);
                        # Insert language to Basemodel
                    }
                }
            }
            return $this->redirect(['/translation/language']);
        }

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id, 'language' => $model->language]);
        //}

        return $this->render('create', [
            'model' => $model,
            'sourcemodel' => $sourcemodel,
            'newlanguage' => $newlanguage,
        ]);
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $language
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($category, $language, $editor="FALSE")
    {
        $data = $this->findModels($category, $language);

        $header = new \stdClass();
        $header->category = $category;
        $header->language = $language ;

        $model = new Message;


        if ($post = Yii::$app->request->post()) {
            foreach ($post['translation'] as $key => $value) {
                if ($value != '') {
                    if (!$targetmodel = $this->findModel($key, $language)) {
                        $targetmodel = new Message;
                        $targetmodel->id = $key;
                        $targetmodel->language = $language;
                    }
                    $targetmodel->translation = $value ;
                    if (!$targetmodel->save()) {
                        echo "<pre>";
                        print_r($targetmodel->getErrors());
                        echo "</pre>";
                        die();
                    }
                }
            }
            return $this->redirect(['/translation/language']);
        }

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //    return $this->redirect(['view', 'id' => $model->id, 'language' => $model->language]);
        //}

        return $this->render('update', [
            'header' => $header,
            'data' => $data,
            'model' => $model,
            'editor' => $editor,
        ]);
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $language
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $language)
    {
        $this->findModel($id, $language)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $language
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $language)
    {
        if (($model = Message::findOne(['id' => $id, 'language' => $language])) !== null) {
            return $model;
        } else {
            return FALSE;
        }
    }

    protected function findModels($category, $language)
    {
        if (($model = SourceMessage::find()->where(['category' => $category])->all()) !== null) {

            $output = [];

            foreach ($model as $value) {
                if (!$translationmodel = $this->findModel($value->id, $language)) {
                    $translation = '';
                } else {
                    $translation = $translationmodel->translation ;
                }
                $output[$value->id] = new \stdClass() ;
                $output[$value->id]->sourcemessage = $value->message ;
                $output[$value->id]->translation = $translation ;
            }
            return $output;
        }
    }

    protected function findBase($category)
    {
        if (($model = LanguageCategory::find()->where(['category' => $category])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function filterlanguage($basemodel)
    {
        $language = json_decode($basemodel->languages, TRUE) ;

        unset($language[$basemodel->base_language]);

        $translations = json_decode($basemodel->data, TRUE) ;

        if (count($translations) > 0) {
            foreach ($translations as $key => $value) {
                unset($language[$key]);
            }
        }

        return $language;
    }

    protected function getSource($category)
    {
        if (($model = SourceMessage::find()->where(['category' => $category])->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function addlanguage($basemodel,$language)
    {
        $baselanguages = json_decode($basemodel->data, TRUE) ;
        if (empty($baselanguages)) {
            $baselanguages = [];
            # code...
        }

        if (!array_key_exists($language, $baselanguages)) {
            $baselanguages[$language] = 1 ;
            $basemodel->data = json_encode($baselanguages);
//            echo $basemodel->data;
            $basemodel->save();
//            var_dump($basemodel->errors);
            return TRUE;
        }

        return FALSE ;
    }

    protected function getTranslation($id, $language)
    {

    }

}
