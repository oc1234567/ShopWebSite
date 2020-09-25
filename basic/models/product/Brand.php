<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $name
 * @property string $telephone
 * @property string $logo
 * @property string|null $desc
 *
 * @property BrandProduct[] $products
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'telephone', 'logo'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['telephone'], 'string', 'max' => 20],
            [['logo'], 'string', 'max' => 1000],
            [['desc'], 'string', 'max' => 10000],
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
            'telephone' => 'Telephone',
            'logo' => 'Logo',
            'desc' => 'Desc',
        ];
    }

    /**
     * Gets query for [[BrandProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrandProducts()
    {
        return $this->hasMany(BrandProduct::className(), ['brand_id' => 'id']);
    }
}
