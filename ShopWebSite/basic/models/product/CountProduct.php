<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "count_product".
 *
 * @property int $count
 * @property int $size_id
 * @property int $color_id
 * @property int $product_id
 *
 * @property ProductSize $size
 * @property ProductColor $color
 * @property Product $product
 */
class CountProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'count_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'size_id', 'color_id', 'product_id'], 'integer'],
            [['size_id', 'color_id', 'product_id'], 'required'],
            [['size_id', 'color_id', 'product_id'], 'unique', 'targetAttribute' => ['size_id', 'color_id', 'product_id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductSize::className(), 'targetAttribute' => ['size_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductColor::className(), 'targetAttribute' => ['color_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'count' => 'Count',
            'size_id' => 'Size ID',
            'color_id' => 'Color ID',
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
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(ProductColor::className(), ['id' => 'color_id']);
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
