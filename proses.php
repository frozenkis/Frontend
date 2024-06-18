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

// Menangani unggah file
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Memeriksa apakah file sudah ada
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Memeriksa ukuran file
if ($_FILES["file-upload"]["size"] > 5000000) { // Maksimum 5MB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Hanya mengizinkan jenis file tertentu (PDF, DOC, DOCX)
if ($fileType != "pdf" && $fileType != "png" && $fileType != "jpg") {
    echo "Sorry, only PDF, DOC & DOCX files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
        $file_path = $target_file;

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
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


require 'koneksi.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Melakukan query untuk mengecek data login
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login WHERE email='$email' AND password='$password'");
    
    // Menghitung jumlah data yang ditemukan
    $hitung = mysqli_num_rows($cekdatabase);
    
    if($hitung > 0){
        header('Location: index.php');
        exit(); // Menambahkan exit setelah header untuk menghentikan eksekusi skrip
    } else {
        echo 'Data tidak ada';
    }
}

$conn->close();
?>
