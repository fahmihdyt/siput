<div class='row'>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = $media->id;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	
	<div class='span6'>   	
   	<div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Request Detail</h3>
       </div>
       <div class="widget-content">
       		<table>
            	<tr>
            		<td width='130px'><label>Event Name</label></td>
            		<td>: <?= $event['nama'] ?></td>
            	</tr> 
            	<tr>
            		<td valign="top"><label>Event Description</label></td>
            		<td>: <?= $event['description'] ?></td>
            	</tr>  
            	<tr>
            		<td><label>Department</label></td>
            		<td>: <?= $event->findCreator($event['creator']); ?> </td>
            	</tr>  
            	<tr>
            		<td><label>Event`s Date</label></td>
            		<td>: <?= $event['date'] ?> </td>
            	</tr>        		
            </table>
            <hr>
            <table>
            	<tr>
            		<td width='130px'><label>Request Date</label></td>
            		<td>: <?= $media['tanggal'] ?> </td>
            	</tr> 
            	<tr>
            		<td width='130px'><label>Publication Number</label></td>
            		<td>: <?= $media['plat'] ?> </td>
            	</tr>
            	<tr>
            		<td width='130px'><label>Status</label></td>
            		<td>: <?= $media['status'] ?> </td>
            	</tr>  
            	<tr>
            		<td width='130px'><label>Type</label></td>
            		<td>: <?= $media['jenis'] ?> </td>
            	</tr> 
            	<tr>
            		<td><label>Email</label></td>
            		<td>: <?= $media['email'] ?></td>
            	</tr>  
            	<tr>
            		<td><label>Phone Number</label></td>
            		<td>: <?= $media->no_hp ?></td>
            	</tr>  
            	<tr>
            		<td><label>Audience Target</label></td>
            		<td>: <?= $media->target_peserta ?></td>
            	</tr>  
            	<tr>
            		<td><label>Publication Media</label></td>
            		<td>: <?= $media->media_publikasi ?></td>
            	</tr>  
            	<tr>
            		<td><label>Size</label></td>
            		<td>: <?= $media->size ?></td>
            	</tr> 
            	<tr>
            		<td><label>Deadline</label></td>
            		<td>: <?= $media->deadline ?></td>
            	</tr>  
            	<tr>
            		<td valign="top"><label>Content</label></td>
            		<td>: <?= $media->konten ?></td>
            	</tr>
            	<tr>
            		<td><label>Color</label></td>
            		<td>: <?= $media->warna ?></td>
            	</tr>  
            	<tr>
            		<td valign="top"><label>Desain Kasar</label></td>
            		<td>: <?= $media->desain_kasar ?></td>
            	</tr>         		
            </table><br>
       		 <p><?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?></p>
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
    </div>


</div>