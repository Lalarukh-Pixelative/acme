<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int|null $from_user_id
 * @property int|null $to_user_id
 * @property int|null $trip_id
 * @property string|null $text
 * @property string|null $created
 *
 * @property User $fromUser
 * @property User $toUser
 * @property Trip $trip
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_user_id', 'to_user_id', 'trip_id'], 'integer'],
            [['text'], 'string', 'max' => 80],
            [['created'], 'string', 'max' => 50],
            [['from_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['from_user_id' => 'id']],
            [['to_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['to_user_id' => 'id']],
            [['trip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trip::className(), 'targetAttribute' => ['trip_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from_user_id' => Yii::t('app', 'From User ID'),
            'to_user_id' => Yii::t('app', 'To User ID'),
            'trip_id' => Yii::t('app', 'Trip ID'),
            'text' => Yii::t('app', 'Text'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    /**
     * Gets query for [[FromUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFromUser()
    {
        return $this->hasOne(User::className(), ['id' => 'from_user_id']);
    }

    /**
     * Gets query for [[ToUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getToUser()
    {
        return $this->hasOne(User::className(), ['id' => 'to_user_id']);
    }

    /**
     * Gets query for [[Trip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(Trip::className(), ['id' => 'trip_id']);
    }
}
