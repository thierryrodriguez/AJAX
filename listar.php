<?php

include_once '../AJAX/PDO/personas_modelo.php';

try {
    $result = Personas_Model::Listar_Personas_Ajax();
    $datos = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row['cedula'];
        $sub_array[] = $row['primer_nombre'];
        $sub_array[] = $row['segundo_nombre'];
        $sub_array[] = $row['primer_apellido'];
        $sub_array[] = $row['segundo_apellido'];
        $sub_array[] = date("d/m/Y", strtotime($row['fecha_nac']));
        $sub_array[] = '<button type="button" name="delete" id="' . $row['id_persona'] . '"class="btn btn-warning btn-xs update">Modificar</button>';
        $sub_array[] = '<button type="button" name="delete" id="' . $row["id_persona"] . '" class="btn btn-danger btn-xs delete">Eliminar</button>';
        $datos[] = $sub_array;
    }
    $output = array(
        "recordsFiltered"    =>    count($result),
        "data"            =>    $datos
    );
    echo json_encode($output);
} catch (Exception $e) {
    echo $e->getMessage();
}
