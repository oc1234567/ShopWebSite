<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "production_pic".
 *
 * @property int $id
 * @property int $product_id
 * @property string $url
 * @property string|null $desc
 * @property int $is_master
 * @property int $pic_order
 * @property string|null $modified_at
 *
 * @property Product $product
 */
class ProductionPic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_pic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'url'], 'required'],
            [['product_id', 'is_master', 'pic_order'], 'integer'],
            [['modified_at'], 'safe'],
            [['url'], 'string', 'max' => 1000],
            [['desc'], 'string', 'max' => 50],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'url' => 'Url',
            'desc' => 'Desc',
            'is_master' => 'Is Master',
            'pic_order' => 'Pic Order',
            'modified_at' => 'Modified At',
        ];
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
