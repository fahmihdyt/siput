<div class='row'>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = 'Approve Request';
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


     <div class="widget span6" style='margin-left: 0px'>
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3><?= Html::encode($this->title) ?></h3>
       </div>
          <!-- /widget-header -->
       <div class="widget-content">
       		

		<div class="media-form">
			
			<table>
		      	<tr>
		      		<td width='130px'><label>Event Name</label></td>
		       		<td>: <?= $event['nama'] ?></td>
		       	</tr> 
		       	<tr>
            		<td width='130px'><label>Type</label></td>
            		<td>: <?= $model['jenis'] ?> </td>
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
            		<td width='130px'><label>Deadline</label></td>
            		<td>: <?= $model['deadline'] ?> </td>
            	</tr>       		
		     </table>
		
		    <?php $form = ActiveForm::begin(); ?>
		                
		    <?= $form->field($model, 'penanggung_jawab')->textInput(['maxlength' => 50,'class'=>'span6']) ?>
		
		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Approve' : 'Approve', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		   		<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
   		    </div>
		
		    <?php ActiveForm::end(); ?>
		
		</div>

       </div>
    </div>

</div>
