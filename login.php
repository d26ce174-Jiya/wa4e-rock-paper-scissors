<?php
$salt = 'XyZzy12*_';
$stored_hash = md5($salt . 'meow123');

if (isset($_POST['cancel'])) {
    header("Location: index1.php");
    exit();
}

if (isset($_POST['who']) && isset($_POST['pass'])) {
    $who = trim($_POST['who']);
    $check = md5($salt . trim($_POST['pass']));
    if ($who !== '' && $check === $stored_hash) {
        header("Location: game.php?name=" . urlencode($who));
        exit();
    } else {
        $error = "Incorrect password! Try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>e87f7ce8 - Login</title></head>
<body>
<h2>Login Form</h2>
<?php if (isset($error)) echo '<p style="color:red;">' . htmlspecialchars($error) . '</p>'; ?>
<form method="POST">
<label>User Name</label><br>
<input type="text" name="who" value="Jiya" required><br><br>
<label>Password</label><br>
<input type="password" name="pass" required><br><br>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>Password hint: Four-character sound a cat makes followed by 123.</p>
</body>
</html>
