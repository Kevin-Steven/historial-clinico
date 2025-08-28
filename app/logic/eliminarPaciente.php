<?php
require "../config/config.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_paciente = $_GET['id'];

    $sql = "UPDATE datos_afiliado SET estado = 0 WHERE id_datos_afiliado = ?";
    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id_paciente);

        if($stmt->execute()) {
            header("Location: ../pages/tablaPacientes.php");
            exit();
        } else {
            echo "Error al intentar actualizar el estado del paciente.";
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta SQL.";
    }
} else {
    echo "ID de paciente no proporcionado.";
}

$conn->close();
?>
