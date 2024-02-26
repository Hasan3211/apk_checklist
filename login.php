<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="proses_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
        <button type="button" onclick="window.location.href='registrasi.php'">Register</button>
    </form>
    </form>
</body>
</html>
