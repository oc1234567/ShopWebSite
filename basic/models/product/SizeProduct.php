<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "size_product".
 *
 * @property int $size_id
 * @property int $product_id
 *
 * @property ProductSize $size
 * @property Product $product
 */
class SizeProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size_id', 'product_id'], 'required'],
            [['size_id', 'product_id'], 'integer'],
            [['size_id', 'product_id'], 'unique', 'targetAttribute' => ['size_id', 'product_id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductSize::className(), 'targetAttribute' => ['size_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'size_id' => 'Size ID',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(ProductSize::className(), ['id' => 'size_id']);
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
