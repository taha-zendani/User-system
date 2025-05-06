<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>لیست کاربران</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>لیست کاربران ثبت‌نام‌شده</h2>
    <table>
        <tr>
            <th>نام</th>
            <th>یوزرنیم</th>
            <th>پسورد</th>
            <th>شماره تماس</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['password']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="logout.php"><input type="submit" value="خروج از حساب"></a>
</body>
</html>
