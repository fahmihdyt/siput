<?php

namespace app\controllers;

use Yii;
use app\models\event;
use app\models\Media;
use app\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ResultMedia;

/**
 * EventController implements the CRUD actions for event model.
 */
class EventController extends Controller
{
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all event models.
     * @return mixed
     */
    public function actionIndex()
    {
    	/*------------VALIDASI & AUTHORIZATION----------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		$role=Yii::$app->user->identity->departemen;
		
		if($role=='super'){
			$data=event::find()->all();
		}else{
			$data=event::findAll(['creator'=>Yii::$app->user->identity->id]);
		}
		
		
        return $this->render('index', [
            'data' => $data,
        ]);
    }
	
	public function actionCreatemedia($id)
    {
    	/*------------VALIDASI & AUTHORIZATION----------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		$role=Yii::$app->user->identity->departemen;
		
        $model = new Media();

        if ($model->load(Yii::$app->request->post()) ) {
        	$model->id_event=$id;
			$model->status='new';
			$model->tanggal=date('Y-m-d');
        	if($model->save())
               {return $this->redirect(['viewmedia', 'id' => $model->id,'event'=>$id]);}
        } else {
            return $this->render('createMedia', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionUpdatemedia($id)
    {
    	/*-----------------VALIDASI & AUTHORIZATION---------------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		//Inisiasi variabel variabel
		$model = Media::findOne(['id'=>$id]);
		$event= event::findOne(['id'=>$model->id_event]);
		$modelOwner=$event->creator;
		$role=Yii::$app->user->identity->departemen;
		$owner=Yii::$app->user->identity->id;
				
   		
   		/* Hanya dapat diupdate oleh pihak yang bersangkutan dan admin(super)
		 * get id event on publikasi 
		 * -> get creator_id on event 
		 * -> cocokan antara creator_id dg yang login
		 * */
		 
   		if(!($modelOwner==$owner || Yii::$app->user->identity->departemen == 'super')){
   			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
   			return $this->redirect('index');
   		}
		
		/* Hanya dapat diupdate sebelum dilakukan approval, kalo sudah di approve harus via admin(super)
		 * Cek status dulu
		 * ->cek dia admin atau bukan
		 * */		 		
	 	if($model->status != 'new'){
	 		if($role!='super')
	 		{
	 			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
	 			return $this->redirect(['viewmedia', 'id' => $model->id,'event'=>$model->id_event]);}
	 		}		 
		/*---------------CLOSE AUTHORIZATION----------------*/	
			
        if ($model->load(Yii::$app->request->post()) ) {
        	if($model->save())
              {return $this->redirect(['viewmedia', 'id' => $model->id,'event'=>$model->id_event]);}
        } else {
            return $this->render('updateMedia', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionDeletemedia($id)
    {
    	/*-----------------VALIDASI & AUTHORIZATION---------------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		//Inisiasi variabel variabel
		$model = Media::findOne(['id'=>$id]);
		$event= event::findOne(['id'=>$model->id_event]);
		$modelOwner=$event->creator;
		$role=Yii::$app->user->identity->departemen;
		$owner=Yii::$app->user->identity->id;
				
   		
   		/* Hanya dapat didelete oleh pihak yang bersangkutan dan admin(super)
		 * get id event on publikasi 
		 * -> get creator_id on event 
		 * -> cocokan antara creator_id dg yang login
		 * */
		 
   		if(!($modelOwner==$owner || Yii::$app->user->identity->departemen == 'super')){
   			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
   			return $this->redirect('index');
   		}
		
		/* Hanya dapat didelete sebelum dilakukan approval, kalo sudah di approve harus via admin(super)
		 * Cek status dulu
		 * ->cek dia admin atau bukan
		 * */		 		
	 	if($model->status != 'new'){
	 		if($role!='super')
	 		{
	 			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
	 			return $this->redirect(['viewmedia', 'id' => $model->id,'event'=>$model->id_event]);}
	 		}		 
		/*---------------CLOSE AUTHORIZATION----------------*/	   	
		        
		$event=$model->id_event;
		$model->delete();

        return $this->redirect(['view','id'=>$event]);
    }	

    /**
     * Displays a single event model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	/*-----------------VALIDASI & AUTHORIZATION---------------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
		//Inisiasi variabel variabel
		$model = $this->findModel($id);
		$modelOwner= $model->creator;
		$role=Yii::$app->user->identity->departemen;
		$owner=Yii::$app->user->identity->id;
				
   		
   		/* Hanya dapat dilihat oleh pihak yang bersangkutan dan admin(super)
		 * get id event on publikasi 
		 * -> get creator_id on event 
		 * -> cocokan antara creator_id dg yang login
		 * */
		 
   		if(!($modelOwner==$owner || Yii::$app->user->identity->departemen == 'super')){
   			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
   			return $this->redirect('index');
   		}
		/*---------------CLOSE AUTHORIZATION----------------*/
		
		
    	$media=new Media();
		$media=$media->findAll(['id_event'=>$id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'media'=> $media
        ]);
    }
	
	public function actionViewmedia($id,$event){
		$media=Media::findOne(['id'=>$id]);
		$event=$this->findModel($event);
		$result=ResultMedia::findAll(['id_publikasi'=>$id]);
		
		return $this->render('viewMedia',['media'=>$media,'event'=>$event,'result'=>$result]);
	}

    /**
     * Creates a new event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	/*-----------------VALIDASI & AUTHORIZATION---------------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		/*---------------CLOSE AUTHORIZATION----------------*/
				
        $model = new event();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    	/*-----------------VALIDASI & AUTHORIZATION---------------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
		//Inisiasi variabel variabel
		$model = $this->findModel($id);
		$modelOwner= $model->creator;
		$role=Yii::$app->user->identity->departemen;
		$owner=Yii::$app->user->identity->id;
				
   		
   		/* Hanya dapat dilihat oleh pihak yang bersangkutan dan admin(super)
		 * get id event on publikasi 
		 * -> get creator_id on event 
		 * -> cocokan antara creator_id dg yang login
		 * */
		 
   		if(!($modelOwner==$owner || Yii::$app->user->identity->departemen == 'super')){
   			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
   			return $this->redirect('index');
   		}
		/*---------------CLOSE AUTHORIZATION----------------*/
		
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
     * Deletes an existing event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	/*-----------------VALIDASI & AUTHORIZATION---------------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
		//Inisiasi variabel variabel
		$model = $this->findModel($id);
		$modelOwner= $model->creator;
		$role=Yii::$app->user->identity->departemen;
		$owner=Yii::$app->user->identity->id;
		$publikasi=$model = Media::findAll(['id_event'=>$id]);
				
   		
   		/* Hanya dapat dilihat oleh pihak yang bersangkutan dan admin(super)
		 * get id event on publikasi 
		 * -> get creator_id on event 
		 * -> cocokan antara creator_id dg yang login
		 * */
		 
   		if(!($modelOwner==$owner || Yii::$app->user->identity->departemen == 'super')){
   			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
   			return $this->redirect('index');
   		}
		
		/*Hanya dapat dihapus apabila belum pernah merequest publikasi*/
		if(count($publikasi)!=0){
			Yii::$app->getSession()->setFlash('danger','Forbidden Access');
   			return $this->redirect('index');
		}
		/*---------------CLOSE AUTHORIZATION----------------*/
		
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
    	
    	/*-----------------VALIDASI & AUTHORIZATION---------------*/
       	if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
        if (($model = event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
