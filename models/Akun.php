<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akun".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $departemen
 * @property string $image
 * @property string $kode_publikasi
 *
 * @property Event[] $events
 * @property FeedbackMedia[] $feedbackMedia
 * @property FeedbackPublikasi[] $feedbackPublikasis
 */
class Akun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 32],
            [['departemen', 'image'], 'string', 'max' => 50],
            [['kode_publikasi'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'departemen' => 'Departemen',
            'image' => 'Image',
            'kode_publikasi' => 'Kode Publikasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['creator' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackMedia()
    {
        return $this->hasMany(FeedbackMedia::className(), ['creator' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackPublikasis()
    {
        return $this->hasMany(FeedbackPublikasi::className(), ['creator' => 'id']);
    }

	public function beforeSave($insert)
	{
		$return = parent::beforeSave($insert);
		$this->password = md5($this->password);
		
		return $return;
	}
}
