<div class='row'>
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\event */

$this->title = 'Create New Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class='span12'>
    <div class="widget">
       <div class="widget-header"> <i class="icon-th-list"></i>
          <h3><?= Html::encode($this->title) ?></h3>
       </div>
          <!-- /widget-header -->
       <div class="widget-content">
       		<?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
       </div>
    </div>
	</div>
</div>

