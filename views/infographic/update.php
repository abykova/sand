<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Infographic */

$this->title = 'Update Infographic: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Infographics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="infographic-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
