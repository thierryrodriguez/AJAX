<?php

include_once '../AJAX/PDO/personas_modelo.php';

if (isset($_POST['persona_id'])) {
    $result = Personas_Model::Eliminar_Personas_Static($_POST['persona_id']);
    if (!empty($result)) {
        echo $result;
    }
}