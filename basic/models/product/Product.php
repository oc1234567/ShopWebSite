<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property float|null $ori_price
 * @property int|null $shelf_life
 * @property string|null $desc
 * @property string|null $create_at
 * @property string|null $indate_at
 * @property string|null $production_date
 * @property string|null $due_date
 * @property string|null $modified_at
 *
 * @property ProductionPic[] $productionPics
 * @property SizeProduct[] $sizes
 * @property ColorProduct[] $colors
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['shelf_life'], 'integer'],
            [['price', 'ori_price'], 'number'],
            [['desc'], 'string'],
            [['create_at', 'indate_at', 'production_date', 'due_date', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    public function extraFields()
    {
        return [
            'picsCount',
            'picUrl',
            'productionPics',
            'picUrls',
            'sizes',
            'colors'
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
            'price' => 'Price',
            'ori_price' => 'Ori Price',
            'shelf_life' => 'Shelf Life',
            'desc' => 'Desc',
            'create_at' => 'Create At',
            'indate_at' => 'Indate At',
            'production_date' => 'Production Date',
            'due_date' => 'Due Date',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * Gets query for [[ProductionPics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionPics()
    {
        return $this->hasMany(ProductionPic::className(), ['product_id' => 'id']);
    }
    
    public function getPicsCount()
    {
        return $this->getProductionPics()->count();
    }

    public function getPicUrls()
    {
        $pics = ProductionPic::find()->where(['product_id' => $this->id])->orderBy('pic_order')->all();
        $pic_urls = [];
        for ($i=0; $i < count($pics); $i++) { 
            $pic_urls[$i] = $pics[$i]->url;
        }
        return $pic_urls;
    }

    public function getPicUrl()
    {
        $customer = ProductionPic::findOne(['product_id' => $this->id, 'is_master' => 1]);
        return $customer->url;
    }

    /**
     * Gets query for [[ProductionPics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSizes()
    {
        return $this->hasMany(SizeProduct::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductionPics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColors()
    {
        return $this->hasMany(ColorProduct::className(), ['product_id' => 'id']);
    }
}
