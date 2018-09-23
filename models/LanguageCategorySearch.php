<?php

namespace vendor\kntodev\i18nmanager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kntodev\i18nmanager\models\LanguageCategory;

/**
 * LanguageCategorySearch represents the model behind the search form of `kntodev\i18nmanager\models\LanguageCategory`.
 */
class LanguageCategorySearch extends LanguageCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category', 'base_language', 'data'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LanguageCategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'base_language', $this->base_language])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
