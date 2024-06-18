


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
            <h1>SISTEM <br> PERPUSTAKAAN <br> ONLINE</h1>
        </div>
    </div>
    <div class="form-container">
        <form action="proses.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <ul>
                <a href="daftar.php">Daftar</a>
                <button type="submit" name="login">Login</button>
            </ul>
            <div class="forgot-password">
                Lupa Password? <a href="lupa_password.php">Klik di sini</a>
            </div>
        </form>
    </div>
</body>
</html>
