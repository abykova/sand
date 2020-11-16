<?php

//var_dump(__DIR__ );
//die();

return [
    'class'     => 'yii\db\Connection',
    'dsn'       => 'sqlite:'.__DIR__ . '/mini.db',
//    'database'  => 'sqlite:/home/abykova/mini.db',
	'username'  => '',
    'password'  => '',
    'charset'   => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
