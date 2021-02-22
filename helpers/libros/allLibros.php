<?php

// DB table to use
$table = 'libros';

// Table's primary key
$primaryKey = 'id_libro';

$join='inner join categoria c on categoria_id=c.id_categoria';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'codigo', 'dt' => 0),
    array('db' => 'nombre_autor', 'dt' => 1),
    array('db' => 'nombre_categoria', 'dt' => 2),
    array('db' => 'nombre_libro', 'dt' => 3),
    array('db' => 'editorial', 'dt' => 4),
    array('db' => 'anio_publicacion', 'dt' => 5),
    array('db' => 'pais_publicacion', 'dt' => 6),
    array('db' => 'estado_libro', 'dt' => 7),
    array('db' => 'id_libro', 'dt' => 8),
    array('db' => 'id_libro', 'dt' => 9),
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
