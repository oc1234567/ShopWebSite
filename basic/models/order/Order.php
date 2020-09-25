<?php

namespace app\models\order;

use Yii;
use app\models\customer\Customer;
use app\models\customer\CustomerAddr;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $address_id
 * @property float $payment_money
 * @property int $payment_method
 * @property string|null $shipping_comp_name
 * @property string|null $shipping_sn
 * @property string|null $shipping_time
 * @property string|null $pay_time
 * @property string|null $receive_time
 * @property string|null $created_at
 * @property int $status
 * @property string|null $comment
 *
 * @property Customer $customer
 * @property CustomerAddr $address
 * @property OrderDetail[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'address_id'], 'required'],
            [['customer_id', 'address_id', 'payment_method', 'status'], 'integer'],
            [['payment_money'], 'number'],
            [['shipping_time', 'pay_time', 'receive_time', 'created_at'], 'safe'],
            [['shipping_comp_name'], 'string', 'max' => 10],
            [['shipping_sn', 'comment'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerAddr::className(), 'targetAttribute' => ['address_id' => 'id']],
        ];
    }

    public function extraFields() {
        return [
            'orderDetails',
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
            'address_id' => 'Address ID',
            'payment_money' => 'Payment Money',
            'payment_method' => 'Payment Method',
            'shipping_comp_name' => 'Shipping Comp Name',
            'shipping_sn' => 'Shipping Sn',
            'shipping_time' => 'Shipping Time',
            'pay_time' => 'Pay Time',
            'receive_time' => 'Receive Time',
            'created_at' => 'Created At',
            'status' => 'Status',
            'comment' => 'Comment',
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

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(CustomerAddr::className(), ['id' => 'address_id']);
    }

    /**
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_id' => 'id']);
    }
}
