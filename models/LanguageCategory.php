<?php

namespace vendor\kntodev\i18nmanager\models;

use Yii;

/**
 * This is the model class for table "language_category".
 *
 * @property int $id
 * @property string $category
 * @property string $base_language
 * @property string $data
 */
class LanguageCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'base_language', 'data'], 'required'],
            [['data'], 'string'],
            [['category'], 'string', 'max' => 100],
            [['base_language'], 'string', 'max' => 10],
            [['category'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'base_language' => 'Base Language',
            'data' => 'Data',
        ];
    }
}
