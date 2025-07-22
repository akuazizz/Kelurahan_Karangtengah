<?php
include 'db.php';

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$jenis = $_POST['jenis'];
$keperluan = $_POST['keperluan'];

$stmt = $conn->prepare("INSERT INTO pengajuan_surat (nama_lengkap, nik, jenis_surat, keperluan) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $nik, $jenis, $keperluan);
$stmt->execute();

if ($stmt->affected_rows > 0) {
  echo "Pengajuan berhasil dikirim.";
} else {
  echo "Gagal mengirim pengajuan.";
}
?>
