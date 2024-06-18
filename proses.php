<?php
require 'koneksi.php';

// Ambil data dari form tambah buku
$judul_seri = $_POST['judul-seri'];
$kode_buku = $_POST['kode-buku'];
$penerbit = $_POST['penerbit'];
$bahasa = $_POST['bahasa'];
$deskripsi_fisik = $_POST['deskripsi-fisik'];
$isbn = $_POST['isbn'];
$jumlah_buku = $_POST['jumlah_buku'];
$file_path = ''; // Sesuaikan dengan cara penyimpanan file yang diunggah

// Simpan data buku ke dalam database
$sql = "INSERT INTO buku (judul_seri, kode_buku, penerbit, bahasa, deskripsi_fisik, isbn, jumlah_buku, ketersediaan, file_path)
        VALUES ('$judul_seri', '$kode_buku', '$penerbit', '$bahasa', '$deskripsi_fisik', '$isbn', '$jumlah_buku', '$jumlah_buku', '$file_path')";

if ($conn->query($sql) === TRUE) {
    // Jika berhasil disimpan, perbarui ketersediaan buku di tabel
    $sql_update_ketersediaan = "UPDATE buku SET ketersediaan = jumlah_buku WHERE id = LAST_INSERT_ID()";
    if ($conn->query($sql_update_ketersediaan) === TRUE) {
        echo "Data buku berhasil ditambahkan.";
        // Redirect ke halaman tambah_buku.php
        header("Location: tambah_buku.php");
        exit(); // Pastikan tidak ada output lain sebelum header()
    } else {
        echo "Error: " . $sql_update_ketersediaan . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
