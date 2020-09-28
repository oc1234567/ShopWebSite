<?php

namespace app\models\order;

use Yii;
use app\models\product\Product;
use app\models\product\ProductSize;
use app\models\product\ProductColor;

/**
 * This is the model class for table "order_detail".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $product_cnt
 * @property float $product_price
 * @property int|null $product_size
 * @property int|null $product_type
 *
 * @property Order $order
 * @property Product $product
 * @property ProductSize $productSize
 * @property ProductColor $productType
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'product_price'], 'required'],
            [['order_id', 'product_id', 'product_cnt', 'product_size', 'product_type'], 'integer'],
            [['product_price'], 'number'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['product_size'], 'exist', 'skipOnError' => true, 'targetClass' => ProductSize::className(), 'targetAttribute' => ['product_size' => 'id']],
            [['product_type'], 'exist', 'skipOnError' => true, 'targetClass' => ProductColor::className(), 'targetAttribute' => ['product_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'product_cnt' => 'Product Cnt',
            'product_price' => 'Product Price',
            'product_size' => 'Product Size',
            'product_type' => 'Product Type',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
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

    /**
     * Gets query for [[ProductSize]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductSize()
    {
        return $this->hasOne(ProductSize::className(), ['id' => 'product_size']);
    }

    /**
     * Gets query for [[ProductType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductColor::className(), ['id' => 'product_type']);
    }
}
