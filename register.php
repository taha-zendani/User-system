<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    if (empty($name) || empty($username) || empty($password) || empty($phone)) {
        $message = "لطفاً همه فیلدها را پر کنید.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, username, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $username, $password, $phone);
        $stmt->execute();
        $message = "ثبت‌نام با موفقیت انجام شد. <a href='login.php'>ورود</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت‌نام</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <form method="POST">
        <h2>ثبت‌نام</h2>
        نام: <input type="text" name="name"><br>
        یوزرنیم: <input type="text" name="username"><br>
        پسورد: <input type="password" name="password"><br>
        شماره تماس: <input type="text" name="phone"><br>
        <input type="submit" value="ثبت‌نام">
    </form>
</body>
</html>
