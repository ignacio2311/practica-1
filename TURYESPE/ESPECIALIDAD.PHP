<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir y validar el ID de especialidad y turno
    $especialidad_id = isset($_POST['especialidad_id']) ? intval($_POST['especialidad_id']) : 0;
    $turno = isset($_POST['turno']) ? htmlspecialchars($_POST['turno']) : '';

    // Mapeo manual de IDs
    switch ($especialidad_id) {
        case 1: $nombre_especialidad = "Contabilidad"; break;
        case 2: $nombre_especialidad = "Logística"; break;
        case 3: $nombre_especialidad = "Programación"; break;
        case 4: $nombre_especialidad = "Inteligencia Artificial"; break;
        case 5: $nombre_especialidad = "Software Embebido"; break;
        case 6: $nombre_especialidad = "Electromecánica"; break;
        case 7: $nombre_especialidad = "Laboratorista Químico"; break;
        default: $nombre_especialidad = "Desconocida"; break;
    }

    if ($especialidad_id >= 1 && $especialidad_id <= 7 && !empty($turno)) {
        echo "<h1>Datos Recibidos Exitosamente</h1>";
        echo "<p><strong>ID enviado:</strong> " . $especialidad_id . "</p>";
        echo "<p><strong>Especialidad:</strong> " . $nombre_especialidad . "</p>";
        echo "<p><strong>Turno:</strong> " . ucfirst($turno) . "</p>";
        
        // Aquí podrías insertar a la Base de Datos usando MySQLi o PDO:
        // $query = "INSERT INTO alumnos (especialidad_id, turno) VALUES ($especialidad_id, '$turno')";
    } else {
        echo "<p>Error: Datos no válidos.</p>";
    }

} else {
    header("Location: index.php");
    exit();
}
?>