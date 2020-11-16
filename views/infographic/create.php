<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Infographic */

$this->title = 'Create Infographic';
$this->params['breadcrumbs'][] = ['label' => 'Infographics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infographic-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
