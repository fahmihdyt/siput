<div class='row'>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Events';
$this->params['breadcrumbs'][] = $this->title;
$dept=Yii::$app->user->identity->departemen;
?>

	
    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Manage Your Event Publication Here!</h3>
    <hr style='border:black;'>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create New Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <!--Notifikasi-->
    <?php
		foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
			echo '<div class="alert alert-' . $key . '">' . $message . '<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
		}
	?>
    
     <div class="widget " style='margin-left: 0px'>
        <div class="widget-header"> <i class="icon-group"></i>
           <h3>My Event</h3>
         </div>
         <div class="widget-content">
            <table class="table table-striped tables">
              <thead>
                 <tr>
                    <th> No </th>
                    <th> Event Name </th>
                    <th> Date </th>
                    <?php if(($dept=='super'|| $dept=='humas' || $dept=='media')){ echo "<th>Departemen</th>";}?>
                   
                    <th class="td-actions"> Action</th>
                  </tr>
               </thead>
              <tbody>
              	  <?php $i=1;foreach($data as $row){?>
                  <tr>
                  	<td><?= $i++ ?></td>
                  	<td><a href="<?= Yii::$app->params['url']?>event/view?id=<?= $row->id; ?>"><?= $row->nama ?></a></td>
                  	<td><?= $row['date'] ?></td>
                  	<?php if(($dept=='super'|| $dept=='humas' || $dept=='media')){ echo "<th>".$row->findCreator($row['creator'])."</th>";}?>
                  	
                    <td class="td-actions"><a href="<?=Yii::$app->params['url']?>event/update?id=<?= $row->id ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"></i></a> <a href="<?=Yii::$app->params['url']?>event/delete?id=<?= $row->id ?>" onclick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-trash "></i></a></td>
                  </tr><?php } ?>
              </tbody>
            </table>
         </div>
      </div>


   

</div>
