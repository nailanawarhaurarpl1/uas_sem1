<?php
include('config.php');

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($mysqli, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "Email sudah terdaftar!";
    } else {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($mysqli, $query)) {
            echo "Pendaftaran berhasil!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="">
        <label for="username">Username: </label>
        <input type="text" name="username" required><br><br>
        
        <label for="email">Email: </label>
        <input type="email" name="email" required><br><br>
        
        <label for="password">Password: </label>
        <input type="password" name="password" required><br><br>
        
        <button type="submit" name="daftar">Daftar</button>
    </form>
</body>
</html>
