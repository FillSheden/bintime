<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $sex
 * @property string $created
 * @property string $email
 */
class Customer extends ActiveRecord
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
            [['login', 'email'], 'unique'],
            ['login', 'string', 'length' => [4, 255]],
            ['password', 'string', 'length' => [6, 255]],
            [['login', 'password', 'sex', 'first_name', 'last_name', 'email'], 'required'],
            [['sex'], 'string'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'sex' => 'Sex',
            'created' => 'Created',
            'email' => 'Email',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->created = Yii::$app->formatter->asTimestamp(date('Y-m-d h:i:s'));
        return parent::beforeSave($insert);
    }
}
