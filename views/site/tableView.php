<?php

use yii\grid\GridView;

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

			],
		]); ?>

    </div>

</div>
