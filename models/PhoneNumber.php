<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phone_number".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $country_id
 * @property int|null $number
 * @property int|null $verification_code
 * @property string|null $verified
 * @property string|null $active
 * @property string|null $created
 *
 * @property Country $country
 * @property User $user
 */
class PhoneNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone_number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'country_id', 'number', 'verification_code'], 'integer'],
            [['verified', 'active'], 'string', 'max' => 3],
            [['created'], 'string', 'max' => 50],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'number' => Yii::t('app', 'Number'),
            'verification_code' => Yii::t('app', 'Verification Code'),
            'verified' => Yii::t('app', 'Verified'),
            'active' => Yii::t('app', 'Active'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
