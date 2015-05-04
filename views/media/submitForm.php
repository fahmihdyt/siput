<div class='row'>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Approve Request';
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	
<div class='span6' style=''>   	
   	<div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3>Submit Design</h3>
       </div>
       <div class="widget-content">
       		<div class="media-form">
			
			<table>
		      	<tr>
		      		<td width='130px'><label>Event Name</label></td>
		       		<td>: <?= $event['nama'] ?></td>
		       	</tr> 
		       	<tr>
            		<td width='130px'><label>Type</label></td>
            		<td>: <?= $media['jenis'] ?> </td>
            	</tr>
		       	<tr>
		       		<td><label>Department</label></td>
		       		<td>: <?= $event->findCreator($event['creator']); ?> </td>
		       	</tr>  
		       	<tr>
            		<td width='130px'><label>Designer</label></td>
            		<td>: <?= $media['penanggung_jawab'] ?> </td>
            	</tr>       		
		     </table>
		     <hr>
		
		    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
		       
		        
		        <?= $form->field($model, 'description')->textInput(["class"=>""]) ?>
		        
		        <!--Cek kalo update file gak usah required-->
		        <?php if($model->isNewRecord){
		        	echo $form->field($model, 'links')->fileInput(['required'=>'required']); 
		        }
		        else{
		        	echo $form->field($model, 'links')->fileInput();
		        }?>
		    
		        <div class="form-group">
		            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
		            <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
		        </div>
		    <?php ActiveForm::end(); ?>
		
		</div>

       </div>
    </div>
</div>
</div>