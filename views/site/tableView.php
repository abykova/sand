<?php

use yii\grid\GridView;

$this->title = 'Таблица';
?>

<div class="site-index">

    <div class="body-content">
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				'date',
				'sum',
				'timing',
				'apr',

				['class' => 'yii\grid\ActionColumn'],

			],
		]); ?>

    </div>

</div>
