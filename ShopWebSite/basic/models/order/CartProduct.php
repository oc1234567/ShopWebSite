<?php

namespace app\models\order;

use Yii;
use app\models\customer\Customer;
use app\models\product\Product;
use app\models\product\ProductColor;
use app\models\product\ProductSize;

/**
 * This is the model class for table "cart_product".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property int $product_num
 * @property float $price
 * @property string $add_time
 *
 * @property Customer $customer
 * @property Product $product
 */
class CartProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'product_id', 'color_id', 'size_id'], 'required'],
            [['customer_id', 'product_id', 'color_id', 'size_id', 'product_num'], 'integer'],
            [['add_time'], 'safe'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductColor::className(), 'targetAttribute' => ['color_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductSize::className(), 'targetAttribute' => ['size_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'product_id' => 'Product ID',
            'product_num' => 'Product Num',
            'color_id' => 'Color ID',
            'size_id' => 'Size ID',
            'add_time' => 'Add Time',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
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
