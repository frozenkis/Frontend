<?php
require 'koneksi.php';

// Mengambil ID buku yang akan diedit dari parameter GET
if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];

    // Query untuk mengambil data buku berdasarkan ID
    $sql = "SELECT * FROM buku WHERE id = $edit_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Memasukkan data buku ke dalam variabel $row
        $row = $result->fetch_assoc();
    } else {
        // Redirect atau pesan error jika tidak ada data dengan ID yang diberikan
        echo "Data tidak ditemukan.";
        exit; // Menghentikan eksekusi script selanjutnya
    }
} else {
    // Redirect atau pesan error jika parameter ID tidak ada
    echo "ID buku tidak diberikan.";
    exit; // Menghentikan eksekusi script selanjutnya
}

// Memproses form jika ada data yang dikirimkan untuk disimpan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai form yang di-submit
    $judul_seri = $_POST['judul-seri'];
    $kode_buku = $_POST['kode-buku'];
    $penerbit = $_POST['penerbit'];
    $bahasa = $_POST['bahasa'];
    $deskripsi_fisik = $_POST['deskripsi-fisik'];
    $isbn = $_POST['isbn'];
    $lokasi = $_POST['lokasi'];
    $jumlah_buku = $_POST['jumlah-buku'];

    // Query untuk mengupdate data buku di database
    $sql_update = "UPDATE buku SET 
                    judul_seri = '$judul_seri',
                    kode_buku = '$kode_buku',
                    penerbit = '$penerbit',
                    bahasa = '$bahasa',
                    deskripsi_fisik = '$deskripsi_fisik',
                    isbn = '$isbn',
                    jumlah_buku = '$jumlah_buku'
                    WHERE id = $edit_id";

    if ($conn->query($sql_update) === TRUE) {
        // Redirect ke halaman data_buku.php setelah update berhasil
        header("Location: data_buku.php");
        exit;
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }

    // Menutup koneksi setelah selesai menggunakan objek mysqli
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tambah_buku.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Edit Buku</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>ADMIN</h1>
        </div>
        <ul>
            <li><a href="index.php"><i class="fas fa-tachometer-alt-fast"></i>&nbsp;<span>Dashboard</span></a></li>
            <li><a href="data_buku.php"><i class="fa-solid fa-book"></i>&nbsp;<span>Data Buku</span></a></li>
            <li><a href="peminjaman.php"><i class="fas fa-cart-plus"></i>&nbsp;<span>Peminjaman</span></a></li>
            <li><a href="pengembalian.php"><i class="far fa-clock"></i>&nbsp;<span>Pengembalian</span></a></li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="user">
                    <a href="#" class="btn">ADMIN <i class="fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="card-table">
                <h1>EDIT BUKU</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $edit_id; ?>" method="post" enctype="multipart/form-data">
                    <h2>Edit Buku</h2>
                    <div class="form-group">
                        <label for="judul-seri"><span class="label-part1">Judul Seri:</span></label>
                        <input type="text" id="judul-seri" name="judul-seri" value="<?php echo $row['judul_seri']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kode-buku">Kode Buku:</label>
                        <input type="text" id="kode-buku" name="kode-buku" value="<?php echo $row['kode_buku']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit:</label>
                        <input type="text" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="bahasa">Bahasa:</label>
                        <select id="bahasa" name="bahasa">
                            <option value="pilih" <?php if ($row['bahasa'] == 'pilih') echo 'selected'; ?>>pilih-</option>
                            <option value="Indonesia" <?php if ($row['bahasa'] == 'Indonesia') echo 'selected'; ?>>Indonesia</option>
                            <option value="English" <?php if ($row['bahasa'] == 'English') echo 'selected'; ?>>English</option>
                            <option value="jepang" <?php if ($row['bahasa'] == 'jepang') echo 'selected'; ?>>Jepang</option>
                            <option value="korea" <?php if ($row['bahasa'] == 'korea') echo 'selected'; ?>>Korea</option>
                            <option value="spanyol" <?php if ($row['bahasa'] == 'spanyol') echo 'selected'; ?>>Spanyol</option>
                            <!-- Tambahkan opsi bahasa lainnya sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi-fisik">Deskripsi Fisik:</label>
                        <select id="deskripsi-fisik" name="deskripsi-fisik">
                            <option value="pilih" <?php if ($row['deskripsi_fisik'] == 'pilih') echo 'selected'; ?>>pilih-</option>
                            <option value="baik" <?php if ($row['deskripsi_fisik'] == 'baik') echo 'selected'; ?>>baik</option>
                            <option value="kurang baik" <?php if ($row['deskripsi_fisik'] == 'kurang baik') echo 'selected'; ?>>kurang baik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN/ISSN:</label>
                        <select id="isbn" name="isbn">
                            <option value="pilih" <?php if ($row['isbn'] == 'pilih') echo 'selected'; ?>>pilih-</option>
                            <option value="ISBN" <?php if ($row['isbn'] == 'ISBN') echo 'selected'; ?>>ISBN</option>
                            <option value="ISSN" <?php if ($row['isbn'] == 'ISSN') echo 'selected'; ?>>ISSN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah-buku">Jumlah Buku:</label>
                        <input type="number" id="jumlah-buku" name="jumlah-buku" value="<?php echo $row['jumlah_buku']; ?>" required>
                    </div>
                    <input type="submit" value="Simpan">
                    <input type="reset" value="Batal">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
