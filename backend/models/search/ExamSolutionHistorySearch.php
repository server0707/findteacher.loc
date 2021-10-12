<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ExamSolutionHistory;

/**
 * ExamSolutionHistorySearch represents the model behind the search form of `backend\models\ExamSolutionHistory`.
 */
class ExamSolutionHistorySearch extends ExamSolutionHistory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'exam_id', 'user_id', 'total_questions_count', 'correct_answers_count', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['answers_list'], 'safe'],
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
        $query = ExamSolutionHistory::find();

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
            'exam_id' => $this->exam_id,
            'user_id' => $this->user_id,
            'total_questions_count' => $this->total_questions_count,
            'correct_answers_count' => $this->correct_answers_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'answers_list', $this->answers_list]);

        return $dataProvider;
    }
}
