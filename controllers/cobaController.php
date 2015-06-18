<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\html;

class cobaController extends Controller{
	
	public $layout='coba';
	
	function actionIndex(){
		$data=array();
		$data['nama']='Fahmi';
		$data['alamat']='depok';
		$nama = "aa";
		return $this->render('coba1',[
			'data'=>$data,
			'nama' => $nama
		]);
	}
	
	
}
