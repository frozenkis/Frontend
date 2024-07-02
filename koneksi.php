<?php
// Informasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpus";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kode_buku = $_POST['kode_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $status = $_POST['status'];

    $sql = "INSERT INTO peminjaman (nama, kode_buku, tgl_pinjam, tgl_kembali, status)
            VALUES ('$nama', '$kode_buku', '$tgl_pinjam', '$tgl_kembali', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Data peminjam berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: peminjaman.php");
    exit();
}

?>

