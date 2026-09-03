<?php
// Variables para almacenar mensajes
$mensaje = "";
$clase_alerta = "";

// Verificar si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtener y limpiar los datos ingresados para evitar inyecciones
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($email)) {
        $mensaje = "Por favor, completa todos los campos.";
        $clase_alerta = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El correo electrónico no es válido.";
        $clase_alerta = "error";
    } else {
        $mensaje = "¡Hola, $nombre! Hemos recibido tu correo ($email) correctamente.";
        $clase_alerta = "exito";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Formulario PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="email"] { width: 100%; max-width: 300px; padding: 8px; }
        button { padding: 8px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .mensaje { padding: 10px; margin-bottom: 15px; border-radius: 4px; max-width: 300px; }
        .error { background-color: #f8d7da; color: #721c24; }
        .exito { background-color: #d4edda; color: #155724; }
    </style>
</head>
<body>

    <h2>Formulario de Registro Sencillo</h2>

    <?php if (!empty($mensaje)): ?>
        <div class="mensaje <?php echo $clase_alerta; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email">
        </div>

        <button type="submit">Enviar Datos</button>
    </form>

</body>
</html>