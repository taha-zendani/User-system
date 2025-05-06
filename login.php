<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        header("Location: users.php");
        exit();
    } else {
        $message = "یوزرنیم یا پسورد اشتباه است.";
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <form method="POST">
        <h2>ورود</h2>
        یوزرنیم: <input type="text" name="username"><br>
        پسورد: <input type="password" name="password"><br>
        <input type="submit" value="ورود">
    </form>
</body>
</html>
