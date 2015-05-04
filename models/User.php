<?php

namespace app\models;

use Yii;
use \yii\web\IdentityInterface;

/**
 * This is the model class for table "akun".
 *
 * @property string $nik
 * @property string $nama
 * @property string $gender
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $alamat
 * @property integer $jabatan
 * @property string $no_telp
 *
 * @property Aktivitas[] $aktivitas
 * @property Jabatan $jabatan0
 * @property Issue[] $issues
 * @property Pengumuman[] $pengumumen
 * @property Projectteam[] $projectteams
 */
class user extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	
	public $authKey='simanproPtJAL';
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
            [['username', 'password'], 'required'],
            ['password','validatePassword']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           
            'username' => 'Username',
            'password' => 'Password',
       ];
    }

	
	public function getId(){
		return $this->id;
	}
	
	public static function findIdentity($id){
		return User::findOne(['id'=>$id]);
	}
	
	public static function findByUsername($username)
    {
       		
		if($hasil=User::findOne(['username' => $username])){
			return $hasil;
		}
        return null;
    }
	
	public function validatePassword($passwords,$username)
    {
    	$passwords = md5($passwords);	
    	$password=User::findOne(['username' => $username, 'password' => $passwords]);
        if(count($password)==0){
        	return false;
        }
		else{
			return true;
		}
    }
	
	public function getAuthKey()
    {
    	return $this->authKey;
    }
	
	public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
	
}
