<?php

namespace app\models;

use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class CalculateForm extends Model
{
	public $data;
	public $sum;
	public $timing;
	public $apr;


	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			[['data', 'sum', 'timing', 'apr'], 'required'],
			[['data'], 'date'],
		];
	}


	public function attributeLabels()
	{
		return [
			'data'   => 'Начальная дата',
			'sum'    => 'Сумма займа',
			'timing' => 'Срок займа в месяцах',
			'apr'    => 'Годовая процентная ставка',
		];
	}


}
