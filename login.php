<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index1.php");
    exit();
}

$names = array('Rock', 'Paper', 'Scissors');

$human = isset($_POST['human']) ? $_POST['human'] + 0 : -1;
$computer = rand(0, 2);

function check($computer, $human) {
    if ($human == $computer) {
        return "Tie";
    }

    if (($human == 0 && $computer == 2) ||
        ($human == 1 && $computer == 0) ||
        ($human == 2 && $computer == 1)) {
        return "You Win";
    }

    return "You Lose";
}

if ($human >= 0 && $human <= 2) {
    $result = check($computer, $human);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors</title>
</head>
<body>

<h1>Rock Paper Scissors</h1>

<p>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></p>

<form method="post">
    <label>Your Play:</label>
    <select name="human">
        <option value="0">Rock</option>
        <option value="1">Paper</option>
        <option value="2">Scissors</option>
    </select>

    <input type="submit" value="Play">
</form>

<?php
if (isset($result)) {
    echo "<p>Your Play=" . $names[$human] . "</p>";
    echo "<p>Computer Play=" . $names[$computer] . "</p>";
    echo "<p>Result=" . $result . "</p>";
}
?>

<form method="post">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>
