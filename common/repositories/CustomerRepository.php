<?php

namespace common\repositories;

use common\models\Customer;
use yii\db\ActiveRecord;

class CustomerRepository extends Customer
{
    /**
     * @param integer $id
     * @return Customer | null
     */
    public function getCustomerById($id)
    {
        return $this::findOne(['id' => (int)$id]);
    }

    /**
     * @return array|ActiveRecord[]
     */
    public function getAllCustomers()
    {
        return $this::find()->all();
    }
}