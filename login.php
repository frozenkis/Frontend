

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1> SISTEM <br> PERPUSTAKAAN <br> ONLINE</h1>
        </div>
    </div>
    <div class="form-container">
        <form action="/login" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <ul>
                <a href="#">daftar</a>
                <button type="submit" formaction="index.php">Login</button>
            </ul>
            <div class="forgot-password">
                Lupa Password?<a href="lupa password">klik disini</a>
            </div>
            
        </form>
    </div>
</body>
</html>
