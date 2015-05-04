<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = 'Create New Media Publication';
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-create" style='margin-left: 30px'>

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
