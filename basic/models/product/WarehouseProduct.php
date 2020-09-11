<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "warehouse_product".
 *
 * @property int $id
 * @property string $name
 * @property int $current_cnt
 *
 * @property Product[] $products
 */
class WarehouseProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warehouse_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['current_cnt'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'current_cnt' => 'Current Cnt',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['warehouse_id' => 'id']);
    }
}
