<?php

namespace app\models;

use Yii;
use app\models\event;

use app\models\Akun;

/**
 * This is the model class for table "publikasi_media".
 *
 * @property integer $id
 * @property integer $id_event
 * @property string $jenis
 * @property string $email
 * @property string $no_hp
 * @property string $target_peserta
 * @property string $media_publikasi
 * @property string $size
 * @property string $deadline
 * @property string $konten
 * @property string $warna
 * @property string $desain_kasar
 * @property string $attachment
 * @property string $status
 * @property string $penanggung_jawab
 * @property string $plat
 * @property string $tanggal
 *
 * @property Event $idEvent
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publikasi_media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_event'], 'integer'],
            [['deadline', 'tanggal'], 'safe'],
            [['konten', 'desain_kasar'], 'string'],
            //[['plat', 'tanggal'], 'required'],
            [['jenis', 'target_peserta', 'media_publikasi', 'size'], 'string', 'max' => 20],
            [['email', 'no_hp'], 'string', 'max' => 50],
            [['warna', 'attachment'], 'string', 'max' => 255],
            [['status', 'penanggung_jawab'], 'string', 'max' => 30],
            [['plat'], 'string', 'max' => 100],
            ['email','email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_event' => 'Id Event',
            'jenis' => 'Jenis',
            'email' => 'Email',
            'no_hp' => 'No Hp',
            'target_peserta' => 'Audience Target',
            'media_publikasi' => 'Media Publikasi',
            'size' => 'Size',
            'deadline' => 'Deadline',
            'konten' => 'Konten',
            'warna' => 'Warna',
            'desain_kasar' => 'Desain Kasar',
            'attachment' => 'Attachment',
            'status' => 'Status',
            'penanggung_jawab' => 'Penanggung Jawab',
            'plat' => 'Plat',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'id_event']);
    }

	public function getEvent($id){
		return event::findOne(["id"=>$id]);
	}
	
	public function findCreator($id){
		$result=Akun::findOne(["id"=>$id]);
		return $result['departemen'];
	}
}
