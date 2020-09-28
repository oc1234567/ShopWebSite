<?php

namespace app\models\product;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\product\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\product\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'shelf_life'], 'integer'],
            [['name', 'desc', 'indate_at', 'production_date', 'due_date', 'modified_at'], 'safe'],
            [['price', 'ori_price'], 'number'],
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
        $query = Product::find();

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
            'price' => $this->price,
            'ori_price' => $this->ori_price,
            'shelf_life' => $this->shelf_life,
            'indate_at' => $this->indate_at,
            'production_date' => $this->production_date,
            'due_date' => $this->due_date,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
