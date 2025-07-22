<?php
include 'db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = 'user'; // default role

$stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $role);
$stmt->execute();

if ($stmt->affected_rows > 0) {
  header("Location: ../login.html?pesan=registrasi_berhasil");
  exit;
} else {
  header("Location: ../register.html?pesan=gagal");
  exit;
}
?>