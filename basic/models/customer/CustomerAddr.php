<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "customer_addr".
 *
 * @property int $id
 * @property int $customer_id
 * @property string|null $zip
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $address
 * @property int $is_default
 * @property string $telephone
 * @property string $shipping_user_name
 *
 * @property Customer $customer
 */
class CustomerAddr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_addr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'province', 'city', 'district', 'address', 'telephone', 'shipping_user_name'], 'required'],
            [['customer_id', 'is_default'], 'integer'],
            [['zip', 'telephone', 'shipping_user_name'], 'string', 'max' => 20],
            [['province', 'city', 'district'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 200],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'zip' => 'Zip',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'address' => 'Address',
            'is_default' => 'Is Default',
            'telephone' => 'Telephone',
            'shipping_user_name' => 'Shipping User Name',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}
