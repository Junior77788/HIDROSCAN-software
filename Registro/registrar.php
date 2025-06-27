<?php
include 'db.php'; // Asegúrate de tener db.php en la misma carpeta

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password']; // Se puede cifrar si deseas
$rol = 'usuario'; // Por defecto

// Evitar duplicados
$verificar = $conn->prepare("SELECT * FROM Usuarios WHERE email = ?");
$verificar->bind_param("s", $correo);
$verificar->execute();
$resultado = $verificar->get_result();

if ($resultado->num_rows > 0) {
  echo "<script>alert('❌ El correo ya está registrado.'); window.history.back();</script>";
  exit;
}
 
$stmt = $conn->prepare("INSERT INTO Usuarios (nombre, email, rol, fecha_creacion) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $nombre, $correo, $rol);

if ($stmt->execute()) {
  echo "<script>alert('✅ Usuario registrado correctamente.'); window.location.href = '../Vista_G/Vista.html';</script>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
