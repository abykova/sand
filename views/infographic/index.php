<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infographics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infographic-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Create Infographic', ['create'], ['class' => 'btn btn-success']) ?>
	</p>


	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'ID',
			'data',
			'sum',
			'timing',
			'apr',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>


</div>