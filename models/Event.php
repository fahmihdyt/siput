<?php

namespace app\models;

use Yii;
use app\models\Akun;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $nama
 * @property string $description
 * @property integer $creator
 * @property string $date
 *
 * @property Akun $creator0
 * @property FeedbackPublikasi[] $feedbackPublikasis
 * @property PublikasiHumas[] $publikasiHumas
 * @property PublikasiMedia[] $publikasiMedia
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['creator'], 'integer'],
            [['date'], 'safe'],
            [['nama'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'description' => 'Description',
            'creator' => 'Creator',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(Akun::className(), ['id' => 'creator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackPublikasis()
    {
        return $this->hasMany(FeedbackPublikasi::className(), ['id_event' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublikasiHumas()
    {
        return $this->hasMany(PublikasiHumas::className(), ['id_event' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublikasiMedia()
    {
        return $this->hasMany(PublikasiMedia::className(), ['id_event' => 'id']);
    }
	
	public function findCreator($id){
		$result=Akun::findOne(["id"=>$id]);
		return $result->departemen;
	}
	
	public function getStatus($date){
		// if($date < date()){
			// return 'Pra Publication';
		// }else{
			// return 'Done';
		// }
		return "construction";
	}
	
	public function beforeSave($insert)
	{
		$return = parent::beforeSave($insert);
		$this->creator = Yii::$app->user->identity->id;
		
		return $return;
	}
}
