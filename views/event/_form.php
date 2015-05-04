<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 255,'class'=>'span6','required'=>'required']) ?>
    
    <?= $form->field($model, 'date')->textInput(['class'=>'span6 date','type'=>'datetime','required'=>'required']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'class'=>'span6','required'=>'required']) ?>
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	 <?= Html::a('Cancel', [$model->isNewRecord?'index':"view?id=$model[id]"], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
