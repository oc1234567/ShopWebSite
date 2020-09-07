<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    public static function tableName()
    {
        return 'Country';
    }
    /*
    rules() must to be implemented in Country class, because CountryController actionCreate() use Country class to generate a model instance; 
    */
    public function rules()
    {
        return [
            [['code', 'name'], 'safe'],
            ['population', 'integer']
        ];
    }
}