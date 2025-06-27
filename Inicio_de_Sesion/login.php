<?php
include 'db.php'; // Asegúrate de que db.php esté en la misma carpeta

$correo = $_POST['correo'];
$password = $_POST['password'];

// ✅ Validar acceso directo como administrador
if ($correo === 'admin' && $password === 'password') {
  echo "<script>alert('✅ Bienvenido, Administrador.'); window.location.href = '../Vista_G/Vista.html';</script>";
  exit;
}

// ✅ Validar usuario registrado en base de datos
$stmt = $conn->prepare("SELECT * FROM Usuarios WHERE email = ? AND contraseña = ?");
$stmt->bind_param("ss", $correo, $password); // Asegúrate de usar el nombre correcto del campo: contraseña o password
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "<script>alert('✅ Inicio de sesión exitoso.'); window.location.href = '../Vista_G/Vista.html';</script>";
} else {
  echo "<script>alert('❌ Usuario o contraseña incorrectos.'); window.history.back();</script>";
}
 
$stmt->close();
$conn->close();
?>


