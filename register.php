<?php
include 'koneksi.php'; // Pastikan file koneksi.php sudah benar dan terhubung ke database

// Tangkap data dari form pendaftaran
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

// Lakukan hashing password sebelum disimpan
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Query SQL untuk memasukkan data pengguna baru ke dalam tabel user
$sql = "INSERT INTO user (nama, email, password) 
        VALUES ('$nama', '$email', '$password_hashed')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
