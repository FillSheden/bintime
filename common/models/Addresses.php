<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "addresses".
 *
 * @property int $id
 * @property int $id_customer
 * @property int $post_index
 * @property string $country
 * @property string $city
 * @property string $street
 * @property int $house
 * @property int $flat
 */
class Addresses extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'city', 'id_customer', 'post_index', 'street', 'house'], 'required'],
            ['post_index', 'match', 'pattern' => '/^\d{5}$/', 'message' => 'Field must contain exactly 5 digits.'],
            [['id_customer', 'house', 'flat'], 'integer'],
            [['country'], 'string', 'max' => 2],
            [['city'], 'string', 'max' => 50],
            [['street'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_customer' => 'Id Customer',
            'post_index' => 'Post Index',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'flat' => 'Flat',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->country = strtoupper($this->country);
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
