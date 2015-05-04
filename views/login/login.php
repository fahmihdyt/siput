<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "\n<div class=\"input-box\">{input}</div>",
        ],
    ]); ?>
	
		<h1 style='margin-left:auto; font-family: Helvetica'>SIPUT FUKI 2015</h1>
		
		<div class="login-fields " style='font-family: Helvetica'>
			<p>Please provide your details</p>
		    <?= $form->field($model, 'username')->textInput(['id' => 'username','class'=>'field username-field', 'placeholder' => 'Username', 'autocomplete' => 'off']) ?>
		    <?= $form->field($model, 'password')->passwordInput(['id' => 'password','class'=>'field password-field', 'placeholder' => 'Password']) ?>
	    </div>
	    
	    
	    <div class='login-actions'>
	        <?= Html::submitButton('LOGIN', ['class' => 'button btn btn-success btn-large', 'name' => 'login-button',]) ?>
	    </div>
	   
    
    <?php ActiveForm::end(); ?>

 
 <?php 
 		if(Yii::$app->getSession()->hasFlash('danger'))
 			echo '<div class="alert-login">' . Yii::$app->getSession()->getFlash('danger') . '</div>'; 
 ?>
 	
</center>







<!--<form action="#" method="post">
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div>
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> 
				
			</div> 
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button class="button btn btn-success btn-large">Sign In</button>
				
			</div> 
			
			
			
</form>-->