<?php

// DB table to use
$table = 'clientes';

// Table's primary key
$primaryKey = 'id_cliente';


// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'cedula', 'dt' => 0),
    array('db' => 'nombre_cliente', 'dt' => 1),
    array('db' => 'apellido_cliente', 'dt' => 2),
    array('db' => 'ciudad', 'dt' => 3),
    array('db' => 'celular', 'dt' => 4),
    array('db' => 'correo_electronico', 'dt' => 5),
    array('db' => 'id_cliente', 'dt' => 6),
    array('db' => 'id_cliente', 'dt' => 7),
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'dbbiblioteca',
    'host' => 'localhost',
);

require('../ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
