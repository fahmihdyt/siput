<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Media */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => 50,'class'=>'span6']) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => 50,'class'=>'span6']) ?>

    <?= $form->field($model, 'jenis')->textInput(['maxlength' => 20,'class'=>'span6']) ?>

    <?= $form->field($model, 'target_peserta')->textInput(['maxlength' => 20,'class'=>'span6']) ?>

    <?= $form->field($model, 'media_publikasi')->textInput(['maxlength' => 20,'class'=>'span6']) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => 20,'class'=>'span6']) ?>

    <?= $form->field($model, 'deadline')->textInput(['type'=>'date','class'=>'span6']) ?>

    <?= $form->field($model, 'konten')->textarea(['rows' => 6,'class'=>'span6']) ?>

    <?= $form->field($model, 'warna')->textInput(['maxlength' => 255,'class'=>'span6']) ?>

    <?= $form->field($model, 'desain_kasar')->textarea(['rows' => 6,'class'=>'span6']) ?>

   <!-- <?= $form->field($model, 'attachment')->textInput(['maxlength' => 255]) ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
