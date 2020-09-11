<?php

namespace app\models\product;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int|null $brand_id
 * @property int|null $one_category_id
 * @property int|null $two_category_id
 * @property int|null $three_category_id
 * @property int $warehouse_id
 * @property float $price
 * @property float|null $ori_price
 * @property int $status
 * @property int|null $shelf_life
 * @property string|null $desc
 * @property int|null $is_new
 * @property int|null $is_reduce
 * @property string|null $create_at
 * @property string|null $indate_at
 * @property string|null $production_date
 * @property string|null $due_date
 * @property string|null $modified_at
 *
 * @property Brand $brand
 * @property ProductCategory $oneCategory
 * @property ProductCategory $twoCategory
 * @property ProductCategory $threeCategory
 * @property WarehouseProduct $warehouse
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
            [['name', 'warehouse_id', 'price'], 'required'],
            [['brand_id', 'one_category_id', 'two_category_id', 'three_category_id', 'warehouse_id', 'status', 'shelf_life', 'is_new', 'is_reduce'], 'integer'],
            [['price', 'ori_price'], 'number'],
            [['desc'], 'string'],
            [['create_at', 'indate_at', 'production_date', 'due_date', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['one_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['one_category_id' => 'id']],
            [['two_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['two_category_id' => 'id']],
            [['three_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['three_category_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => WarehouseProduct::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
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
            'brand_id' => 'Brand ID',
            'one_category_id' => 'One Category ID',
            'two_category_id' => 'Two Category ID',
            'three_category_id' => 'Three Category ID',
            'warehouse_id' => 'Warehouse ID',
            'price' => 'Price',
            'ori_price' => 'Ori Price',
            'status' => 'Status',
            'shelf_life' => 'Shelf Life',
            'desc' => 'Desc',
            'is_new' => 'Is New',
            'is_reduce' => 'Is Reduce',
            'create_at' => 'Create At',
            'indate_at' => 'Indate At',
            'production_date' => 'Production Date',
            'due_date' => 'Due Date',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[OneCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOneCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'one_category_id']);
    }

    /**
     * Gets query for [[TwoCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTwoCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'two_category_id']);
    }

    /**
     * Gets query for [[ThreeCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThreeCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'three_category_id']);
    }

    /**
     * Gets query for [[Warehouse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(WarehouseProduct::className(), ['id' => 'warehouse_id']);
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
