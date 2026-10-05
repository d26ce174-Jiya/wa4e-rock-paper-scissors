
<?php
session_start();

if (isset($_SESSION['name'])) {
    header("Location: game.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aadrittshaya f29de078</title>
</head>
<body>
    <h1>Welcome to Rock Paper Scissors</h1>
    <p><a href="login.php">Please Log In</a></p>
</body>
</html>