<?php
// Verificar si se han enviado datos por el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los valores enviados desde el formulario
  $correo = $_POST['correo'];
  $sugerencia = $_POST['sugerencia'];
  
  // Realizar las acciones necesarias con los datos
  // Por ejemplo, enviar un correo electrónico
  $destinatario = 'tucorreo@example.com';
  $asunto = 'Nueva sugerencia';
  $mensaje = "Correo electrónico: $correo\nSugerencia: $sugerencia";
  
  // Enviar el correo electrónico
  mail($destinatario, $asunto, $mensaje);
  
  // Puedes redirigir al usuario a una página de confirmación o mostrar un mensaje de éxito
  // Redirección de ejemplo:
  header('Location: confirmacion.html');
  exit();
}
?>
