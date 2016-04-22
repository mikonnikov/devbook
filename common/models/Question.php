<?php

namespace common\models;

use Yii;

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
            [['id', 'title'], 'required'],
            [['id', 'project_id', 'category_id', 'language_id', 'user_id'], 'integer'],
            [['descr'], 'string'],
            [['add_time', 'edit_time'], 'safe'],
            [['title'], 'string', 'max' => 500],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Question title'),
            'descr' => Yii::t('app', 'Question text'),
            'project_id' => Yii::t('app', 'Related project'),
            'category_id' => Yii::t('app', 'Category'),
            'language_id' => Yii::t('app', 'Programming language'),
            'user_id' => Yii::t('app', 'Question author'),
            'add_time' => Yii::t('app', 'Add time'),
            'edit_time' => Yii::t('app', 'Edit Time'),
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
}
