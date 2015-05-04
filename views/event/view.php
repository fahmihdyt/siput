<div class='row'>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\event */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<!--Notifikasi-->
    <?php
		foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
			echo '<div class="alert alert-' . $key . '">' . $message . '<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
		}
	?>
	
	<!--Detail Acara-->
	<div class='span12'>
    <div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Event Detail</h3>
       </div>
       <div class="widget-content">
       		<h1><?= Html::encode($this->title) ?></h1>
       		<h4><i><?= $model->date ?></i></h4>
       		<p style='font-size: 15px;'><?= $model->description?></p>
       		
       		<p style="text-align: right">
		        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
		            'class' => 'btn btn-danger',
		            'onclick' => "return confirm('Are You Sure Want to Delete?)",
		        ]) ?>
		        <?= Html::a('back', ['index'], ['class' => 'btn btn-default']) ?>
		    </p>
       </div>
    </div>
    </div>

    
   <div class='span6' style=''>
   	 <div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Media Publication</h3>
       </div>
       <div class="widget-content">       		
       		<?= Html::a('Create New Publication', ['createmedia','id'=>$model['id']], ['class' => 'btn btn-primary']) ?>
       		<hr style='border: 1px solid grey'>
       		
       		<table class='table table-striped'>
       		<thead>
       			<th>Type</th>
       			<th>Deadline</th>
       			<th>Status</th>
       			<th>Designer</th>
       			<th class='td-actions'>Action</th>
       		</thead>
       		<tbody>
       			<?php foreach($media as $row){ ?>
       			<tr>
       				<td><a href='<?= Yii::$app->params['url']?>event/viewmedia?id=<?= $row['id']?>&event=<?= $_GET['id']?>'><?= $row['jenis'] ?></a></td>
       				<td><?= $row['deadline'] ?></td>
       				<td><?= $row['status'] ?></td>
       				<td><?= $row['penanggung_jawab'] ?></td>  
       				<td class="td-actions"><a href="<?=Yii::$app->params['url']?>event/updatemedia?id=<?= $row->id ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"></i></a> <a href="<?=Yii::$app->params['url']?>event/deletemedia?id=<?= $row->id ?>" onclick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-trash "></i></a></td>
                    					
       			</tr><?php } ?>
       		</tbody>	
       </table>
       </div>
       
    </div>
   </div>
   
   <div class='span6'>
   	<div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Humas Publication</h3>
       </div>
       <div class="widget-content">
       		<i>Coming Soon...</i>
       </div>
    </div>
   </div>

</div>
