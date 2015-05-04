<div class='row'>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\event;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Media Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="media-index" style='margin-left: 30px;'> -->
   
    
    <!--New Job & On Process-->
    <h1 style='margin-left: 30px'><?= Html::encode($this->title) ?></h1><br>  
    <div class='span6' style=''> 
    		
	   	<div class="widget">
	       <div class="widget-header"> <i class="icon-th-list"></i>
	          <h3>New Job!</h3>
	       </div>
	       <div class="widget-content">
	       		<table class='table table-striped'>
	       			<thead>
	       				<th>Deadline</th>
	       				<th>Event</th>
	       				<th>Type</th>	       				
	       				<th>Department</th>
	       				<th>Action</th>
	       			</thead>
	       			<tbody>
	       				<?php foreach($data as $row){
	       					$event=$row->getEvent($row['id_event']);
						?>
	       				<tr>
	       					<td><?= $row['deadline']; ?></td>
	       					<td><a href='<?=Yii::$app->params['url']?>media/view?id=<?= $row['id'] ?>'><?= $event['nama']; ?></a></td>
	       					<td><?= $row['jenis']; ?></td>
	       					<td><?= $row->findCreator($event['creator']) ?></td>
	       					<td><a href="<?= Yii::$app->params['url']?>media/approve?id=<?= $row['id'] ?>"><button class='btn btn-primary'>Approve</button></a></td>	       						
	       				</tr> <?php } ?>
	       			</tbody>
	       		</table>
	       </div>
	    </div>
	      	
	   	<div class="widget">
	       <div class="widget-header"> <i class="icon-th-list"></i>
	          <h3>On Process!</h3>
	       </div>
	       <div class="widget-content">
	       		<table class='table table-striped '>
	       			<thead>
	       				<th>Deadline</th>
	       				<th>Event</th>
	       				<th>Type</th>	       				
	       				<th>Designer</th>
	       				<th>Action</th>
	       			</thead>
	       			<tbody>
	       				<?php foreach($data2 as $row){
	       					$event=$row->getEvent($row['id_event']);
						?>
	       				<tr>
	       					<td><?= $row['deadline']; ?></td>
	       					<td><a href='<?=Yii::$app->params['url']?>media/view?id=<?= $row['id'] ?>'><?= $event['nama']; ?></a></td>
	       					<td><?= $row['jenis']; ?></td>
	       					<td><?= $row->penanggung_jawab ?></td>
	       					<td><a href="<?= Yii::$app->params['url']?>media/submit?id=<?= $row['id'] ?>"><button class='btn btn-primary'>Submit</button></a></td>	       						
	       				</tr> <?php } ?>
	       			</tbody>
	       		</table>
	       </div>
	    </div>
    </div>
    
    <div class='span6' style=''>   	
	   	<div class="widget">
	       <div class="widget-header"> <i class="icon-th-list"></i>
	          <h3>Job Done!</h3>
	       </div>
	       <div class="widget-content">
	       		<table class='table table-striped tables'>
	       			<thead>
	       				<th>No.</th>
	       				<th>Event</th>
	       				<th>Type</th>
	       				<th>Department</th>	       				
	       				<!-- <th>Designer</th> -->
	       				<th>Action</th>
	       			</thead>
	       			<tbody>
	       				<?php $i=1;foreach($data3 as $row){
	       					$event=$row->getEvent($row['id_event']);
							
						?>
	       				<tr>
	       					<td><?= $i++ ?></td>
	       					<td><a href='<?=Yii::$app->params['url']?>media/view?id=<?= $row['id'] ?>'><?= $event['nama']; ?></a></td>
	       					<td><?= $row['jenis']; ?></td>
	       					<td><?= $row->findCreator($event['creator']) ?></td>
	       					<!-- <td><?= $row->penanggung_jawab ?></td> -->
	       					<td><a href='<?= Yii::$app->params['url']?>media/modify?id=<?=$row['id']?>'><button class='btn btn-primary'>Modify</button></a>
	       						<a href='<?= Yii::$app->params['url']?>media/submit?id=<?=$row['id']?>'><button class='btn btn-primary'>Add Design</button></a>
	       					</td>
	       				</tr> <?php } ?>
	       			</tbody>
	       		</table>
	       </div>
	    </div>
    </div>

<!-- </div> -->
</div>