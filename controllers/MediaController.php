<?php

namespace app\controllers;

use Yii;
use app\models\ResultMedia;
use app\models\Media;
use app\models\Setting;
use app\models\event;
use app\models\Akun;
use app\models\MediaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * MediaController implements the CRUD actions for Media model.
 */
class MediaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Media models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data=Media::findAll(["status"=>'new']);
		$data2=Media::findAll(["status"=>'approved']);
		$data3=Media::findAll(['status'=>'done']);
        return $this->render('index', [
            'data' => $data,
            'data2'=>$data2,
            'data3'=>$data3
        ]);
    }

    /**
     * Displays a single Media model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$media=$this->findModel($id);
    	$event=event::findOne(['id'=>$media['id_event']]);
		$resultMedia=ResultMedia::findAll(['id_publikasi'=>$id]);
        return $this->render('view', [
        	'event' => $event,
            'media' => $media,
            'result'=> $resultMedia
        ]);
    }

    /**
     * Creates a new Media model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Media();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionSubmit($id){
		$media=$this->findModel($id);
		$model=new ResultMedia();
		$event=event::findOne(['id'=>$media['id_event']]);
		
		if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
			
			 $model->id_publikasi=$id;
			
			 //proses upload gambar
			 $imageName = UploadedFile::getInstance($model, 'links');
			 
			 //proses simpan ke database
			 $model->links = $imageName->name;
			 $path = 'upload/'.$model->links;
			 
			//proses save! 
			if($model->save()){
				$media->status='done';
				$media->save();
               	$imageName->saveAs($path);
				return $this->redirect(['view','id'=>$id]);
            }else {
            	 return $this->render('submitForm', [
	                'model' => $model,'media'=>$media,'event'=>$event
	            ]);
            }			
        } else {
            return $this->render('submitForm', [
                'model' => $model,'media'=>$media,'event'=>$event
            ]);
        }
		
	}
	
	public function actionModify($id){
		$media=$this->findModel($id);
		$model=ResultMedia::findOne(['id_publikasi'=>$id]);
		$event=event::findOne(['id'=>$media['id_event']]);
		$image=$model->links;
		if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
			
			 $model->id_publikasi=$id;
			 
			 //proses upload gambar
			 $imageName = UploadedFile::getInstance($model, 'links');
			 
			 //cek ada uploadan apa enggak
			 if(!isset($imageName)){
			 	$model->links=$image;
				if($model->save()){					
					return $this->redirect(['view','id'=>$id]);
	            }
			 }
			 
			 //proses simpan ke database
			 $model->links = $imageName->name;
			 $path = 'upload/'.$model->links;
			 
			//proses save! 
			if($model->save()){
				$media->status='done';
				$media->save();
               	$imageName->saveAs($path);
				return $this->redirect(['view','id'=>$id]);
            }else {
            	 return $this->render('submitForm', [
	                'model' => $model,'media'=>$media,'event'=>$event
	            ]);
            }			
        } else {
            return $this->render('submitForm', [
                'model' => $model,'media'=>$media,'event'=>$event
            ]);
        }
		
	}

    /**
     * Updates an existing Media model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Media model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	public function actionApprove($id){
		$model=$this->findModel($id);
		$event=event::findOne(['id'=>$model['id_event']]);
		$creator=Akun::findOne(['id'=>$event['creator']]);
		$settingTahun=Setting::findOne(['name'=>'fuki']);
		$bulan=date("m",strtotime($model['deadline']));
		$publikasi=Setting::findOne(['name'=>'last_design']);
		$publikasi=(int)$publikasi['value'];
		$publikasi+=1;
		$publikasix=Setting::findOne(['name'=>'last_design']);
						
		if ($model->load(Yii::$app->request->post())) {			
			
			//set publikasi plat
			$plat="FUKI/".$settingTahun['value']."/".$bulan."/".$creator['kode_publikasi']."/".$publikasi;
			$model->plat=$plat;
			$model->status='approved';
			if($model->save()){
				$publikasix->value=(string)$publikasi;
				$publikasix->save();
            	return $this->redirect(['index']);}
        } else {
            return $this->render('approveForm', [
                'model' => $model,
                'event'=> $event
            ]);
            
        }
	}

    /**
     * Finds the Media model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Media the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Media::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
