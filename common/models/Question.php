<?php

namespace common\models;

use Yii;
use dosamigos\taggable\Taggable;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $title
 * @property string $descr
 * @property integer $project_id
 * @property integer $category_id
 * @property integer $language_id
 * @property integer $user_id
 * @property string $add_time
 * @property string $edit_time
 * @property string $answer
 * @property string $error
 * @property string $answer_url
 * @property string $ticket
 * @property boolean $solved
 * @property boolean $private
 * @property string $error_url
 *
 * @property User $user
 * @property Project $project
 * @property Category $category
 * @property Language $language
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['id', 'project_id', 'category_id', 'language_id', 'user_id'], 'integer'],
            [['descr'], 'string'],
            [['answer'], 'string'],
            [['answer_url', 'error_url'], 'string'],
            [['ticket'], 'string'],
            [['add_time', 'edit_time'], 'safe'],
            [['title'], 'string',  'max' => 500],
            [['error'], 'string',  'max' => 500],
            [['ticket'], 'string', 'max' => 500],
            [['user_id'],     'exist', 'skipOnError' => true, 'targetClass' => User::className(),     'targetAttribute' => ['user_id'     => 'id']],
            [['project_id'],  'exist', 'skipOnError' => true, 'targetClass' => Project::className(),  'targetAttribute' => ['project_id'  => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['answer_url', 'error_url'],  'string', 'max' => 500],
            ['solved', 'default', 'value' => 0],
            ['private', 'default', 'value' => 0],
            ['solved', 'in', 'range' => [0, 1]],
            ['private', 'in', 'range' => [0, 1]],
            [['tagNames'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => Yii::t('app', 'ID'),
            'title'         => Yii::t('app', 'Question title'),
            'error'         => Yii::t('app', 'Error text'),
            'descr'         => Yii::t('app', 'Question text'),
            'project_id'    => Yii::t('app', 'Related project'),
            'category_id'   => Yii::t('app', 'Category'),
            'language_id'   => Yii::t('app', 'Programming language'),
            'user_id'       => Yii::t('app', 'Question author'),
            'add_time'      => Yii::t('app', 'Add time'),
            'edit_time'     => Yii::t('app', 'Edit Time'),
            'answer'        => Yii::t('app', 'Authors answer'),
            'answer_url'    => Yii::t('app', 'Solution URL'),
            'error_url'     => Yii::t('app', 'Error URL'),
        ];
    }

    /**
     * Extensions
     * @return array
     */
    public function behaviors() {
        return [
            [
                'class' => Taggable::className(),
            ],
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
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return array
     */
    public function getQuestionsList()
    {
        return \yii\helpers\ArrayHelper::map(\common\models\Question::find()->all(), 'id', 'title');
    }

    /**
     * Get array of answers
     * @return array (id => title)
     */
    public function getAnswers() {
        return \yii\helpers\ArrayHelper::map(\common\models\Answer::find()->where(['question_id' => $this->id])->all(), 'id', 'title');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('question_tag', ['question_id' => 'id']);
    }
}
