<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

		<?php $form = ActiveForm::begin([
			'id' => 'calculate-form',
			'layout' => 'horizontal',
			'fieldConfig' => [
				'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
				'labelOptions' => ['class' => 'col-lg-1 control-label'],
			],
		]); ?>

		<?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
			'language' => 'ru',
			'dateFormat' => 'dd.MM.yyyy',
		])?>
		<?= $form->field($model, 'sum')->textInput() ?>
		<?= $form->field($model, 'timing')->textInput() ?>
		<?= $form->field($model, 'apr')->textInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
				<?= Html::submitButton('Расчитать', ['class' => 'btn btn-primary', 'name' => 'btn']) ?>
            </div>
        </div>

		<?php ActiveForm::end(); ?>


    </div>
</div>
