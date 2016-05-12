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
 *
 * @property User $user
 * @property Question $question
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
            [['question_id'],  'exist', 'skipOnError' => true, 'targetClass' => Question::className(),  'targetAttribute' => ['question_id'  => 'id']],
            [['user_id'],      'exist', 'skipOnError' => true, 'targetClass' => User::className(),      'targetAttribute' => ['user_id'      => 'id']],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    /**
     * Set question
     * @param $id
     */
    public function setQuestionId($id) {
        $this->question_id = $id;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => Yii::t('app', 'Answer ID'),
            'title'         => Yii::t('app', 'Title'),
            'descr'         => Yii::t('app', 'Answer text'),
            'user_id'       => Yii::t('app', 'Author'),
            'add_time'      => Yii::t('app', 'Answer time'),
            'ref_url'       => Yii::t('app', 'Reference URL'),
            'question_id'   => Yii::t('app', 'Question'),
        ];
    }
}
