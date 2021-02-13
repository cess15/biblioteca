<?php

// DB table to use
$table = 'usuarios';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'cedula', 'dt' => 0),
    array('db' => 'nombre',  'dt' => 1),
    array('db' => 'apellido',  'dt' => 2),
    array('db' => 'email',  'dt' => 3),
    array('db' => 'telefono',  'dt' => 4),
    array('db' => 'genero',  'dt' => 5),
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'dbbiblioteca',
    'host' => 'localhost',
);

require('ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
