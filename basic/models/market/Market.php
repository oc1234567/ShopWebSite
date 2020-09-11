<?php

namespace app\models\market;

use Yii;

/**
 * This is the model class for table "market".
 *
 * @property int $id
 * @property string|null $name
 * @property int $state
 *
 * @property MarketProduct[] $marketProducts
 */
class Market extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'market';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state'], 'integer'],
            [['name'], 'string', 'max' => 20],
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
            'state' => 'State',
        ];
    }

    /**
     * Gets query for [[MarketProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProducts()
    {
        return $this->hasMany(MarketProduct::className(), ['market_id' => 'id']);
    }
}
