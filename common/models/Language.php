<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $name
 * @property string $version
 * @property string $url
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'version'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Language ID'),
            'name' => Yii::t('app', 'Language name'),
            'version' => Yii::t('app', 'Version'),
            'url' => Yii::t('app', 'Official page'),
        ];
    }

    /**
     * @return array
     */
    public function getLanguagesList()
    {
        return \yii\helpers\ArrayHelper::map(\common\models\Language::find()->all(), 'id', 'name');
    }

    /**
     * @return array
     */
    public function getQuestionsList()
    {
        return \yii\helpers\ArrayHelper::map(\common\models\Question::find()->where(['language_id' => $this->id])->all(), 'id', 'name');
    }
}
