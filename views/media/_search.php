<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MediaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_event') ?>

    <?= $form->field($model, 'jenis') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'target_peserta') ?>

    <?php // echo $form->field($model, 'media_publikasi') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'deadline') ?>

    <?php // echo $form->field($model, 'konten') ?>

    <?php // echo $form->field($model, 'warna') ?>

    <?php // echo $form->field($model, 'desain_kasar') ?>

    <?php // echo $form->field($model, 'attachment') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'penanggung_jawab') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
