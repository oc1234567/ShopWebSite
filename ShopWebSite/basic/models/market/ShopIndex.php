<?php

namespace app\models\market;

use Yii;

/**
 * This is the model class for table "shop_index".
 *
 * @property int $id
 * @property int $type
 * @property int|null $type_id
 * @property string|null $img_url
 *
 * @property IndexPos[] $indexPos
 */
class ShopIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_index';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'type_id'], 'integer'],
            [['img_url'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'type_id' => 'Type ID',
            'img_url' => 'Img Url',
        ];
    }

    /**
     * Gets query for [[IndexPos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndexPos()
    {
        return $this->hasMany(IndexPos::className(), ['index_id' => 'id']);
    }
}
