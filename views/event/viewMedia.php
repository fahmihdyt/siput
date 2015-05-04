<div class='row'>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!--Notifikasi-->
    <?php
		foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
			echo '<div class="alert alert-' . $key . '">' . $message . '<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
		}
	?>

<!--Detail-->
  <div class='span6'>
	<div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Publication Detail</h3>
       </div>
       <div class="widget-content">
       		<table>
       			<tr>
       				<td width="130"><label>Request Date</label></td>
       				<td>: <?= $media->tanggal ?></td>
       			</tr>
       			<tr>
       				<td width="130"><label>Publication No.</label></td>
       				<td>: <?= $media->plat?></td>
       			</tr>
       			<tr>
       				<td><label>Event Name</label></td>
       				<td>: <?= $event->nama?></td>
       			</tr>          			
       			<tr>
       				<td><label>Status</label></td>
       				<td>: <?= $media->status?></td>
       			</tr>    			
       			<tr>
       				<td><label>Type</label></td>
       				<td>: <?= $media->jenis?></td>
       			</tr>
       			<tr>
       				<td><label>Audience Target</label></td>
       				<td>: <?= $media->target_peserta?></td>
       			</tr>
       			<tr>
       				<td><label>Publication Media</label></td>
       				<td>: <?= $media->media_publikasi?></td>
       			</tr>       			
       			<tr>
       				<td><label>Size</label></td>
       				<td>: <?= $media->size?></td>
       			</tr>
       			<tr>
       				<td><label>Deadline</label></td>
       				<td>: <?= $media->deadline?></td>
       			</tr>
       			<tr>
       				<td><label>Designer</label></td>
       				<td>: <?= $media->penanggung_jawab?></td>
       			</tr>
       		</table><br>
       		<p><?= Html::a('back', ['view','id'=>$event['id']], ['class' => 'btn btn-primary']) ?></p>
       </div>
    </div>   
   </div>
   
   <div class='span6'>   	
   	<div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Result</h3>
       </div>
       <div class="widget-content">
       		<table>
       		<?php
       			foreach($result as $row){?>
       			<tr>
       				<td><h4><?=$row['description']?></h4></td>
       			</tr>
       			<tr>
       				<td><h5><a href='<?php echo Yii::$app->params['upload'].$row['links']?>'>Download</a></h5></td>
       			</tr>
       			<?php }
       		?>
       		</table>
       </div>
     </div>
    
      
	<div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Give Feedback</h3>
       </div>
       <div class="widget-content">
       		<i>Coming Soon...</i>
       </div>
    </div>
   </div>
  
 </div>