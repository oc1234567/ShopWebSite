<?php

namespace app\models\market;

use Yii;
use app\models\product\Product;

/**
 * This is the model class for table "market_product".
 *
 * @property int $market_id
 * @property int $product_id
 *
 * @property Market $market
 * @property Product $product
 */
class MarketProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'market_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['market_id', 'product_id'], 'required'],
            [['market_id', 'product_id'], 'integer'],
            [['market_id'], 'exist', 'skipOnError' => true, 'targetClass' => Market::className(), 'targetAttribute' => ['market_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'market_id' => 'Market ID',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * Gets query for [[Market]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarket()
    {
        return $this->hasOne(Market::className(), ['id' => 'market_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
