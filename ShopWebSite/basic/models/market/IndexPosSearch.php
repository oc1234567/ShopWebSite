<?php

namespace app\models\market;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\market\IndexPos;

/**
 * IndexPosSearch represents the model behind the search form of `app\models\market\IndexPos`.
 */
class IndexPosSearch extends IndexPos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['index_id'], 'integer'],
            [['column', 'row'], 'safe'],
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
        $query = IndexPos::find();

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
            'index_id' => $this->index_id,
        ]);

        $query->andFilterWhere(['like', 'column', $this->column])
            ->andFilterWhere(['like', 'row', $this->row]);

        return $dataProvider;
    }
}
