<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $_SESSION['username'] = $username;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("Location: admin.php");
        exit();
    } else {
        header("Location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 80px;
        }
        form {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
        }
        input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Login Page</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
