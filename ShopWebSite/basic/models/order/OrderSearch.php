<?php

namespace app\models\order;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\order\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\order\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'address_id', 'payment_method', 'status'], 'integer'],
            [['payment_money'], 'number'],
            [['shipping_comp_name', 'shipping_sn', 'shipping_time', 'pay_time', 'receive_time', 'created_at', 'comment'], 'safe'],
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
        $query = Order::find();

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
            'address_id' => $this->address_id,
            'payment_money' => $this->payment_money,
            'payment_method' => $this->payment_method,
            'shipping_time' => $this->shipping_time,
            'pay_time' => $this->pay_time,
            'receive_time' => $this->receive_time,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'shipping_comp_name', $this->shipping_comp_name])
            ->andFilterWhere(['like', 'shipping_sn', $this->shipping_sn])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
