<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/data buku.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>perpus</title>
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
                <h2>peminjam buku</h2>
                <br>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tanggal kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $sql = "SELECT * FROM peminjaman";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['kode_buku']."</td>
                                <td>".$row['tgl_pinjam']."</td>
                                <td>".$row['tgl_kembali']."</td>
                                <td>".$row['status']."</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data peminjaman</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
