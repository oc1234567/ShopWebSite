<?php

namespace app\models\market;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\market\ShopIndex;

/**
 * ShopIndexSearch represents the model behind the search form of `app\models\market\ShopIndex`.
 */
class ShopIndexSearch extends ShopIndex
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'type_id'], 'integer'],
            [['img_url'], 'safe'],
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
        $query = ShopIndex::find();

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
            'type' => $this->type,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'img_url', $this->img_url]);

        return $dataProvider;
    }
}
