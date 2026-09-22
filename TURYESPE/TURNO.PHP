<?php
// Declaramos variables para guardar el mensaje y el estado
$mensaje = "";
$clase_alerta = "";

// Verificar si el formulario ha sido enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validar que el campo 'turno' exista y no esté vacío
    if (!empty($_POST['turno'])) {
        // Limpiar el dato recibido para mayor seguridad
        $turno_seleccionado = htmlspecialchars($_POST['turno']);

        // Evaluar cuál turno seleccionó el usuario
        if ($turno_seleccionado == "matutino") {
            $mensaje = "Has seleccionado el <strong>Turno Matutino</strong> (7:00 AM - 1:00 PM).";
            $clase_alerta = "exito";
        } elseif ($turno_seleccionado == "vespertino") {
            $mensaje = "Has seleccionado el <strong>Turno Vespertino</strong> (2:00 PM - 8:00 PM).";
            $clase_alerta = "exito";
        } else {
            $mensaje = "Opción de turno no válida.";
            $clase_alerta = "error";
        }
    } else {
        $mensaje = "Por favor, selecciona un turno antes de enviar.";
        $clase_alerta = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección y Procesamiento de Turno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 320px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #0056b3;
        }
        /* Estilos para los mensajes de respuesta */
        .mensaje {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
        }
        .exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Mostrar el mensaje de respuesta si existe -->
    <?php if (!empty($mensaje)): ?>
        <div class="mensaje <?php echo $clase_alerta; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <!-- Formulario apuntando a sí mismo -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="turno">Selecciona tu Turno:</label>
        <select id="turno" name="turno" required>
            <option value="" disabled selected>-- Elije una opción --</option>
            <option value="matutino">Turno Matutino (7:00 AM - 1:00 PM)</option>
            <option value="vespertino">Turno Vespertino (2:00 PM - 8:00 PM)</option>
        </select>

        <button type="submit">Guardar Selección</button>
    </form>
</div>

</body>
</html>