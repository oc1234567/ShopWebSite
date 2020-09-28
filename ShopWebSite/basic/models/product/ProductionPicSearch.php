<?php

namespace app\models\product;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\product\ProductionPic;

/**
 * ProductionPicSearch represents the model behind the search form of `app\models\ProductionPic`.
 */
class ProductionPicSearch extends ProductionPic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'is_master', 'pic_order'], 'integer'],
            [['url', 'desc', 'modified_at'], 'safe'],
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
        $query = ProductionPic::find();

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
            'product_id' => $this->product_id,
            'is_master' => $this->is_master,
            'pic_order' => $this->pic_order,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
