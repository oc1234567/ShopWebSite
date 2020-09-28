<?php

namespace app\models\customer;

use Yii;
use app\models\order\Order;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string|null $nick_name
 * @property string|null $avatar_url
 * @property int|null $gender
 * @property string|null $province
 * @property string|null $city
 * @property string|null $country
 * @property string|null $openid
 * @property string|null $sessionkey
 * @property string|null $mobile_phone
 * @property string|null $login_name
 * @property string|null $password_hash
 * 
 * @property CustomerAddr[] $customerAddrs
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender'], 'integer'],
            [['nick_name', 'province', 'city', 'country', 'password_hash'], 'string', 'max' => 100],
            [['avatar_url', 'openid', 'sessionkey'], 'string', 'max' => 1000],
            [['mobile_phone', 'login_name'], 'string', 'max' => 20],
        ];
    }

    public function extraFields() {
        return [
            'customerAddrs',
            'orders'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nick_name' => 'Nick Name',
            'avatar_url' => 'Avatar Url',
            'gender' => 'Gender',
            'province' => 'Province',
            'city' => 'City',
            'country' => 'Country',
            'openid' => 'Openid',
            'sessionkey' => 'Sessionkey',
            'mobile_phone' => 'Mobile Phone',
            'login_name' => 'Login Name',
            'password_hash' => 'Password Hash',
        ];
    }

    public function getCustomerAddrs() {
        return $this->hasMany(CustomerAddr::className(), ['customer_id' => 'id']);
    }

    public function getOrders() {
        return $this->hasMany(Order::className(), ['customer_id' => 'id']);
    }
}
