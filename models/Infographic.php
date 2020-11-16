<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "infographic".
 *
 * @property int $ID
 * @property int $date
 * @property int $sum
 * @property int $timing
 * @property int $apr
 */
class Infographic extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'infographic';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['date', 'sum', 'timing', 'apr'], 'required'],
			[['sum', 'timing', 'apr'], 'integer'],
//			[['data'], 'date'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'ID'     => 'ID',
			'date'   => 'Начальная дата',
			'sum'    => 'Сумма займа',
			'timing' => 'Срок займа в месяцах',
			'apr'    => 'Годовая процентная ставка',
		];
	}
}