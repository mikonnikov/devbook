<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `common\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'category_id', 'language_id', 'user_id'], 'integer'],
            [['title', 'descr', 'add_time', 'edit_time', 'answer', 'error', 'answer_url'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Question::find();

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
            'project_id' => $this->project_id,
            'category_id' => $this->category_id,
            'language_id' => $this->language_id,
            'user_id' => $this->user_id,
            'add_time' => $this->add_time,
            'edit_time' => $this->edit_time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'descr', $this->descr])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'error', $this->error])
            ->andFilterWhere(['like', 'answer_url', $this->answer_url]);

        return $dataProvider;
    }
}
