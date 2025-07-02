<?php
session_start();

// Auto logout after 60 seconds of inactivity
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is the admin panel.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
