<?php

// DB table to use
$table = 'prestamos';

// Table's primary key
$primaryKey = 'id_prestamo';

$join="INNER JOIN libros l on libro_id=l.id_libro JOIN usuarios u on bibliotecario_id=u.id_usuario JOIN clientes c on cliente_id=c.id_cliente where u.id_usuario='{$_GET['id']}'";

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'nombre_cliente', 'dt' => 0),
    array('db' => 'apellido_cliente', 'dt' => 1),
    array('db' => 'nombre_libro', 'dt' => 2),
    array('db' => 'fecha_prestamo', 'dt' => 3),
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
    SSP::join($_GET, $sql_details, $table, $join,$primaryKey, $columns)
);
