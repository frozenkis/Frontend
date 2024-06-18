<?php

include 'koneksi.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utama.css">
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
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>ADMIN<i class="fa-solid fa-user"></i></h1>
                        <h3>3</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>Data Buku<i class="fa-solid fa-book"></i></h1>
                        <h3>100</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>buku yang dipinjam</h1>
                        <h3>3</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>buku yang terlambat</h1>
                        <h3>3</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>