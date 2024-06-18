<?php
require 'koneksi.php';

// Proses penghapusan data buku jika parameter hapus_id ada dan tidak kosong
if (isset($_GET['hapus_id']) && !empty($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];

    // Query hapus data buku
    $sql_hapus = "DELETE FROM buku WHERE id = $hapus_id";

    if ($conn->query($sql_hapus) === TRUE) {
        // Penghapusan berhasil
    } else {
        echo "Error: " . $sql_hapus . "<br>" . $conn->error;
    }
}

// Mengambil data buku setelah proses penghapusan
$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/data buku.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Admin Panel</title>
    <script>
        // Fungsi untuk konfirmasi penghapusan
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = 'data_buku.php?hapus_id=' + id;
            }
        }

        // Fungsi untuk pencarian di tabel
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementsByTagName("table")[0];
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }
        }
    </script>
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
                <div class="table-header">
                    <button class="add-btn" onclick="window.location.href='tambah_buku.php'"><i class="fa-light fa-plus"></i>Tambah Data Buku</button>
                    <div class="search-bar">
                        <button onclick="searchTable()"><i class="fa-solid fa-search"></i></button>
                        <input type="text" id="searchInput" placeholder="Search...">
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Seri</th>
                            <th>Kode Buku</th>
                            <th>Penerbit</th>
                            <th>Bahasa</th>
                            <th>Deskripsi Fisik</th>
                            <th>ISBN/ISSN</th>
                            <th>Jumlah Buku</th>
                            <th>Ketersediaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            // Output data dari setiap baris
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["judul_seri"] . "</td>
                                        <td>" . $row["kode_buku"] . "</td>
                                        <td>" . $row["penerbit"] . "</td>
                                        <td>" . $row["bahasa"] . "</td>
                                        <td>" . $row["deskripsi_fisik"] . "</td>
                                        <td>" . $row["isbn"] . "</td>
                                        <td>" . $row["jumlah_buku"] . "</td>
                                        <td>" . $row["ketersediaan"] . "</td>
                                        <td>
                                            <a class='edit-btn' href='edit.php?id=" . $row["id"] . "'><i class='fa-solid fa-pen' style='background-color: yellow;'></i></a>
                                            <a class='delete-btn' href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'><i class='fa-solid fa-trash-can' style='color:red'></i></a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>Tidak ada data</td></tr>";
                        }
                        $conn->close(); // Menutup koneksi setelah selesai menggunakan objek mysqli
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
