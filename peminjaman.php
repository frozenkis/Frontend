<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/data buku.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>perpus</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
                <h2>Peminjam Buku</h2>
                <button id="myBtn">Tambah Data Peminjam</button>
                <br><br>
                
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Tambah Data Peminjam</h2>
                        <form action="add_peminjam.php" method="post">
                            <label for="nama">Nama:</label>
                            <input type="text" id="nama" name="nama" required><br><br>
                            <label for="kode_buku">Kode Buku:</label>
                            <input type="text" id="kode_buku" name="kode_buku" required><br><br>
                            <label for="tgl_pinjam">Tanggal Pinjam:</label>
                            <input type="date" id="tgl_pinjam" name="tgl_pinjam" required><br><br>
                            <label for="tgl_kembali">Tanggal Kembali:</label>
                            <input type="date" id="tgl_kembali" name="tgl_kembali" required><br><br>
                            <label for="status">Status:</label>
                            <input type="text" id="status" name="status" required><br><br>
                            <input type="submit" value="Tambah">
                        </form>
                    </div>
                </div>

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
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
