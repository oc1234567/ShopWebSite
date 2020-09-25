<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property string|null $pic
 *
 * @property CategoryProduct[] $products
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['pic'], 'string', 'max' => 1000],
        ];
    }

    public function extraFields() {
        return [
            'categoryProducts',
            'subCategories'
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
            'parent_id' => 'Parent ID',
            'pic' => 'Pic',
        ];
    }

    /**
     * Gets query for [[CategoryProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts() {
        return $this->hasMany(CategoryProduct::className(), ["category_id" => 'id']);
    }

    public function getSubCategories() {
        return $this->hasMany(ProductCategory::className(), ["parent_id" => "id"]);   
    }

}
