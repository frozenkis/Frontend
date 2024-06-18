<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tambah_buku.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>perpus</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>ADMIN</h1>
        </div>
        <ul>
        <li><a href="index..php"><i class="fas fa-tachometer-alt-fast"></i>&nbsp;<span>Dashboard</span></a></li>
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
                <h1>TAMBAH BUKU</h1>
    <form action="proses.php" method="post" enctype="multipart/form-data">
        <h2>TAMBAH BUKU</h2>
        <div class="form-group">
            <label for="judul-seri"><span class="label-part1">Judul Seri:</span></label>
            <input type="text" id="judul-seri" name="judul-seri" required>
        </div>
        <div class="form-group">
            <label for="kode-buku">Kode Buku:</label>
        <input type="text" id="kode-buku" name="kode-buku" required>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" required>
        </div>
        <div class="form-group">
            <label for="bahasa">Bahasa:</label>
            <select id="bahasa" name="bahasa">
                <option value="pilih">pilih-</option>
                <option value="Indonesia">Indonesia</option>
                <option value="English">English</option>
                <option value="jepang">Jepang</option>
                <option value="korea">Korea</option>
                <option value="spanyol">Spanyol</option>
                <!-- Tambahkan opsi bahasa lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="form-group">
            <label for="deskripsi-fisik">Deskripsi Fisik:</label>
            <select id="text" id="deskripsi-fisik" name="deskripsi-fisik">
                <option value="pilih">pilih-</option>
                <option value="pilih">baik</option>
                <option value="pilih">kurang baik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN/ISSN:</label>
            <select id="text" id="isbn" name="isbn"><br>
                <option value="pilih">pilih-</option>
                <option value="pilih">ISBN</option>
                <option value="pilih">ISSN</option>
            </select>
        </div>
        <div class="form-group">
            <label for="lokasi"><span class="label-part1">lokasi:</span></label>
            <input type="text" id="lokasi" name="lokasi" required>
        </div>
        <div class="form-group">
            <label for="jumlah-buku">jumlah buku:</label>
            <input type="number" id="jumlah buku" name="jumlah buku"><br>
        </div>
        <div class="form-group">
            
            <div class="file-input-container">
                <label for="file-upload">Upload File:</label>
                <input type="file" id="file-upload" name="file-upload">
            </div>
        </div>
        <input type="submit" value="Simpan">
        <input type="reset" value="Batal">
    </form>
            </div>
        </div>
    </div>
</body>

</html>
