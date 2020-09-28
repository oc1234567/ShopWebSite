<?php

namespace app\models\market;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\market\MarketProduct;

/**
 * MarketProductSearch represents the model behind the search form of `app\models\market\MarketProduct`.
 */
class MarketProductSearch extends MarketProduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['market_id', 'product_id'], 'integer'],
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
        $query = MarketProduct::find();

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
            'market_id' => $this->market_id,
            'product_id' => $this->product_id,
        ]);

        return $dataProvider;
    }
}
