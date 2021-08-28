<?php
include_once '../AJAX/PDO/personas_modelo.php';

if (isset($_POST['h_operación'])) {
    if ($_POST['h_operacion'] == "Agregar") {
        $id_persona_ingresada = Personas_Model::Agregar_Persona_Static(
            $_POST['txt_cedula'],
            $_POST['txt_primer_nombre'],
            $_POST['txt_segundo_nombre'],
            $_POST['txt_primer_apellido'],
            $_POST['txt_segundo_apellido'],
            date("Ymd", strtotime($_POST['txt_fecha_nac']))
        );

        if (!empty($id_persona_ingresada)) {
            echo $id_persona_ingresada;
        }
        if ($_POST['h_operacion'] == "Editar") {
            $persona_modificada = Personas_Model::Modificar_Persona_Static(
                $_POST['txt_cedula'],
                $_POST['txt_primer_nombre'],
                $_POST['txt_segundo_nombre'],
                $_POST['txt_primer_apellido'],
                $_POST['txt_segundo_apellido'],
                date("Ymd", strtotime(
                    $_POST['txt_fecha_nac']
                )),
                $_POST['h_persona_id']

            );
            if (!empty($persona_modificada)) {
                echo $persona_modificada;
            }
        }
    }
}
