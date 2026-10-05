
<?php
session_start();

if (isset($_POST['who']) && isset($_POST['pass'])) {
    $who = trim($_POST['who']);
    $pass = $_POST['pass'];

    if ($who !== '' && $pass !== '') {
        $_SESSION['name'] = $who;
        header("Location: game.php");
        exit();
    } else {
        $error = "Both fields are required";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aadrittshaya f29de078</title>
</head>
<body>
    <h1>Please Log In</h1>

    <?php
    if (isset($error)) {
        echo '<p>' . htmlspecialchars($error) . '</p>';
    }
    ?>

    <form method="post">
        <label>Username:</label>
        <input type="text" name="who">
        <br><br>

        <label>Password:</label>
        <input type="password" name="pass">
        <br><br>

        <input type="submit" value="Log In">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>