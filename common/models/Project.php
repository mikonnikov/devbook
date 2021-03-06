<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property string $descr
 * @property string $url
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'],      'required'],
            [['descr'],     'string'],
            [['name'],      'string', 'max' => 255],
            [['url'],       'string', 'max' => 200],
            [['url_dev'],   'string', 'max' => 200],
            [['url_prod'],  'string', 'max' => 200],
            [['name'],      'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => Yii::t('app', 'Project ID'),
            'name'      => Yii::t('app', 'Project name'),
            'descr'     => Yii::t('app', 'Description'),
            'url'       => Yii::t('app', 'Local Url'),
            'url_dev'   => Yii::t('app', 'Dev Url'),
            'url_prod'  => Yii::t('app', 'Prod Url'),
        ];
    }

    /**
     * @return array
     */
    public function getProjectsList()
    {
        return \yii\helpers\ArrayHelper::map(\common\models\Project::find()->all(), 'id', 'name');
    }
}
