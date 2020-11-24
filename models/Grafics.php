<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grafics".
 *
 * @property int|null $_id
 * @property int|null $id_graph
 * @property int|null $number_plut
 * @property int|null $date_plut
 * @property int|null $sum_pogashaemyh_proc
 * @property int|null $sum_osnovnogo_dolga
 * @property int|null $ostatok_osnovnogo_dolga
 */
class Grafics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grafics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_graph', 'number_plut', 'date_plut', 'sum_pogashaemyh_proc', 'sum_osnovnogo_dolga', 'ostatok_osnovnogo_dolga'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'Id',
            'id_graph' => 'Id Graph',
            'number_plut' => 'Number Plut',
            'date_plut' => 'Date Plut',
            'sum_pogashaemyh_proc' => 'Sum Pogashaemyh Proc',
            'sum_osnovnogo_dolga' => 'Sum Osnovnogo Dolga',
            'ostatok_osnovnogo_dolga' => 'Ostatok Osnovnogo Dolga',
        ];
    }
}

