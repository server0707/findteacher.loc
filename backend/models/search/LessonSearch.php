<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Lesson;

/**
 * LessonSearch represents the model behind the search form of `backend\models\Lesson`.
 */
class LessonSearch extends Lesson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'subject_id', 'viewed', 'student_count', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['about_uz', 'about_ru', 'keywords', 'description_uz', 'description_ru', 'price', 'old_price', 'link_of_lesson_video'], 'safe'],
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
        $query = Lesson::find();

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
            'user_id' => $this->user_id,
            'subject_id' => $this->subject_id,
            'viewed' => $this->viewed,
            'student_count' => $this->student_count,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'about_uz', $this->about_uz])
            ->andFilterWhere(['like', 'about_ru', $this->about_ru])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'old_price', $this->old_price])
            ->andFilterWhere(['like', 'link_of_lesson_video', $this->link_of_lesson_video]);

        return $dataProvider;
    }
}
