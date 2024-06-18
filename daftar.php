
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1> SISTEM <br> PERPUSTAKAAN <br> ONLINE</h1>
        </div>
    </div>
    <div class="form-container">
        <form action="/register" method="post">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>

            <label for="confirm_password">Konfirmasi Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Masukkan ulang password Anda" required>

            <ul><button type="submit">Daftar</button></ul>
            <div class="forgot-password">
                sudah punya akun?<a href="login.php">login</a>
            </div>
        </form>
    </div>
</body>
</html>
