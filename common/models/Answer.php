<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property integer $id
 * @property string $title
 * @property string $descr
 * @property integer $user_id
 * @property string $add_time
 * @property string $ref_url
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descr'], 'required'],
            [['descr'], 'string'],
            [['user_id'], 'integer'],
            [['add_time'], 'safe'],
            [['title', 'ref_url'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Answer ID'),
            'title' => Yii::t('app', 'Title'),
            'descr' => Yii::t('app', 'Answer text'),
            'user_id' => Yii::t('app', 'Author'),
            'add_time' => Yii::t('app', 'Answer time'),
            'ref_url' => Yii::t('app', 'Reference URL'),
        ];
    }
}
