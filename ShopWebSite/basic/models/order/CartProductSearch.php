<?php

namespace app\models\order;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\order\CartProduct;

/**
 * CartProductSearch represents the model behind the search form of `app\models\order\CartProduct`.
 */
class CartProductSearch extends CartProduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'product_id', 'size_id', 'color_id', 'product_num'], 'integer'],
            [['add_time'], 'safe'],
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
        $query = CartProduct::find();

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
            'customer_id' => $this->customer_id,
            'product_id' => $this->product_id,
            'product_num' => $this->product_num,
            'color_id' => $this->color_id,
            'size_id' => $this->size_id,
            'add_time' => $this->add_time,
        ]);

        return $dataProvider;
    }
}
