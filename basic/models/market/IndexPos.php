<?php

namespace app\models\market;

use Yii;

/**
 * This is the model class for table "index_pos".
 *
 * @property int|null $index_id
 * @property string|null $column
 * @property string|null $row
 *
 * @property ShopIndex $index
 */
class IndexPos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'index_pos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['index_id'], 'integer'],
            [['column', 'row'], 'string', 'max' => 20],
            [['index_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopIndex::className(), 'targetAttribute' => ['index_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'index_id' => 'Index ID',
            'column' => 'Column',
            'row' => 'Row',
        ];
    }

    /**
     * Gets query for [[Index]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndex()
    {
        return $this->hasOne(ShopIndex::className(), ['id' => 'index_id']);
    }
}
