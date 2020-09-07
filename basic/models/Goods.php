<?php

namespace app\models;

use yii\db\ActiveRecord;

class Goods extends ActiveRecord
{
    public static function tableName()
    {
        return 'GOODS';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['gname', 'gprice', 'gdescription', 'gpast_due'], 'safe'],
        ];
    }

}