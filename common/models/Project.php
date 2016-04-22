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
            [['name'], 'required'],
            [['descr'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 500],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Project ID'),
            'name' => Yii::t('app', 'Project name'),
            'descr' => Yii::t('app', 'Description'),
            'url' => Yii::t('app', 'Url'),
        ];
    }
}
